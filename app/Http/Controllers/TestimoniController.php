<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimonial::orderBy('urutan')->paginate(10);
        return view('admin.testimoni', compact('testimoni'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'nullable|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kutipan' => 'required|min:10',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('testimonials', 'public');
        }

        $data['aktif'] = $request->boolean('aktif');

        Testimonial::create($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|max:255',
            'jabatan' => 'nullable|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kutipan' => 'required|min:10',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        if ($request->hasFile('foto')) {
            if ($testimonial->foto) {
                Storage::disk('public')->delete($testimonial->foto);
            }
            $data['foto'] = $request->file('foto')->store('testimonials', 'public');
        } elseif ($request->delete_foto && $testimonial->foto) {
            Storage::disk('public')->delete($testimonial->foto);
            $data['foto'] = null;
        }

        $data['aktif'] = $request->boolean('aktif');

        $testimonial->update($data);

        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->foto) {
            Storage::disk('public')->delete($testimonial->foto);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimoni.index')->with('success', 'Testimoni berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:testimonials,id',
            'items.*.urutan' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Testimonial::where('id', $item['id'])->update(['urutan' => $item['urutan']]);
        }

        return response()->json(['success' => true]);
    }
}
