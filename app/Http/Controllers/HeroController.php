<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index(Request $request)
    {
        $query = Hero::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('subjudul', 'like', "%{$search}%")
                  ->orWhere('tagline', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('aktif', $request->status);
        }

        $heroes = $query->orderBy('urutan')->paginate(10);
        return view('admin.hero', compact('heroes'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|max:255',
            'subjudul' => 'nullable|max:255',
            'tagline' => 'nullable|max:255',
            'badge' => 'nullable|max:100',
            'gambar_bg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cta_text' => 'nullable|max:100',
            'cta_link' => 'nullable|max:255',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = strip_tags($data['judul']);
        $data['subjudul'] = isset($data['subjudul']) ? strip_tags($data['subjudul']) : null;
        $data['tagline'] = isset($data['tagline']) ? strip_tags($data['tagline']) : null;
        $data['badge'] = isset($data['badge']) ? strip_tags($data['badge']) : null;
        $data['cta_text'] = isset($data['cta_text']) ? strip_tags($data['cta_text']) : null;
        $data['cta_link'] = isset($data['cta_link']) ? strip_tags($data['cta_link']) : null;

        if ($request->hasFile('gambar_bg')) {
            $data['gambar_bg'] = $request->file('gambar_bg')->store('heroes', 'public');
        }

        $data['aktif'] = $request->boolean('aktif');

        Hero::create($data);

        return redirect()->route('admin.hero.index')->with('success', 'Slide hero berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $hero = Hero::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|max:255',
            'subjudul' => 'nullable|max:255',
            'tagline' => 'nullable|max:255',
            'badge' => 'nullable|max:100',
            'gambar_bg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cta_text' => 'nullable|max:100',
            'cta_link' => 'nullable|max:255',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = strip_tags($data['judul']);
        $data['subjudul'] = isset($data['subjudul']) ? strip_tags($data['subjudul']) : null;
        $data['tagline'] = isset($data['tagline']) ? strip_tags($data['tagline']) : null;
        $data['badge'] = isset($data['badge']) ? strip_tags($data['badge']) : null;
        $data['cta_text'] = isset($data['cta_text']) ? strip_tags($data['cta_text']) : null;
        $data['cta_link'] = isset($data['cta_link']) ? strip_tags($data['cta_link']) : null;

        if ($request->hasFile('gambar_bg')) {
            if ($hero->gambar_bg) {
                Storage::disk('public')->delete($hero->gambar_bg);
            }
            $data['gambar_bg'] = $request->file('gambar_bg')->store('heroes', 'public');
        } elseif ($request->delete_foto && $hero->gambar_bg) {
            Storage::disk('public')->delete($hero->gambar_bg);
            $data['gambar_bg'] = null;
        }

        $data['aktif'] = $request->boolean('aktif');

        $hero->update($data);

        return redirect()->route('admin.hero.index')->with('success', 'Slide hero berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);
        if ($hero->gambar_bg) {
            Storage::disk('public')->delete($hero->gambar_bg);
        }
        $hero->delete();

        return redirect()->route('admin.hero.index')->with('success', 'Slide hero berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:heroes,id',
            'items.*.urutan' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Hero::where('id', $item['id'])->update(['urutan' => $item['urutan']]);
        }

        return response()->json(['success' => true]);
    }
}
