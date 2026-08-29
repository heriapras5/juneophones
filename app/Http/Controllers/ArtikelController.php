<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('judul', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $artikels = $query->orderBy('created_at', 'desc')->paginate(10);
        $kategoriList = Artikel::select('kategori')->distinct()->whereNotNull('kategori')->pluck('kategori')->filter();
        return view('admin.artikel.index', compact('artikels', 'kategoriList'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori' => 'nullable|max:100',
            'penulis' => 'nullable|max:100',
            'tgl_publikasi' => 'nullable|date',
            'status' => 'nullable|in:draft,publish',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = strip_tags($data['judul']);
        $data['kategori'] = isset($data['kategori']) ? strip_tags($data['kategori']) : null;
        $data['penulis'] = isset($data['penulis']) ? strip_tags($data['penulis']) : null;

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('artikels', 'public');
        }

        $data['slug'] = Str::slug($request->judul);
        $data['aktif'] = $request->boolean('aktif');
        $data['status'] = $request->status ?? 'draft';

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|max:255',
            'konten' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'kategori' => 'nullable|max:100',
            'penulis' => 'nullable|max:100',
            'tgl_publikasi' => 'nullable|date',
            'status' => 'nullable|in:draft,publish',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = strip_tags($data['judul']);
        $data['kategori'] = isset($data['kategori']) ? strip_tags($data['kategori']) : null;
        $data['penulis'] = isset($data['penulis']) ? strip_tags($data['penulis']) : null;

        if ($request->hasFile('foto')) {
            if ($artikel->foto) Storage::disk('public')->delete($artikel->foto);
            $data['foto'] = $request->file('foto')->store('artikels', 'public');
        } elseif ($request->delete_foto && $artikel->foto) {
            Storage::disk('public')->delete($artikel->foto);
            $data['foto'] = null;
        }

        $data['slug'] = Str::slug($request->judul);
        $data['aktif'] = $request->boolean('aktif');
        $data['status'] = $request->status ?? 'draft';

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($artikel->foto) Storage::disk('public')->delete($artikel->foto);
        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
