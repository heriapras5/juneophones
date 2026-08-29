<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('status')) {
            $query->where('aktif', $request->status);
        }

        $galeris = $query->orderBy('urutan')->orderBy('created_at', 'desc')->paginate(12);
        $kategoriList = Galeri::where('aktif', true)->select('kategori')->distinct()->pluck('kategori')->filter();
        return view('admin.galeri', compact('galeris', 'kategoriList'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable|max:100',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = strip_tags($data['judul']);
        $data['deskripsi'] = isset($data['deskripsi']) ? strip_tags($data['deskripsi']) : null;
        $data['kategori'] = isset($data['kategori']) ? strip_tags($data['kategori']) : null;
        $data['foto'] = $request->file('foto')->store('galeris', 'public');
        $data['aktif'] = $request->boolean('aktif');

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'nullable',
            'kategori' => 'nullable|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = strip_tags($data['judul']);
        $data['deskripsi'] = isset($data['deskripsi']) ? strip_tags($data['deskripsi']) : null;
        $data['kategori'] = isset($data['kategori']) ? strip_tags($data['kategori']) : null;

        if ($request->hasFile('foto')) {
            if ($galeri->foto) Storage::disk('public')->delete($galeri->foto);
            $data['foto'] = $request->file('foto')->store('galeris', 'public');
        } elseif ($request->delete_foto && $galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
            $data['foto'] = null;
        }

        $data['aktif'] = $request->boolean('aktif');
        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->foto) Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
