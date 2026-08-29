<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        return redirect()->route('admin.settings.edit');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'judul' => 'nullable|max:255',
            'deskripsi' => 'required',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'aktif' => 'boolean',
        ]);

        $data['judul'] = isset($data['judul']) ? strip_tags($data['judul']) : null;
        $data['deskripsi'] = strip_tags($data['deskripsi']);
        $data['visi'] = isset($data['visi']) ? strip_tags($data['visi']) : null;
        $data['misi'] = isset($data['misi']) ? strip_tags($data['misi']) : null;

        $about = About::first();
        if (!$about) {
            $about = new About();
        }

        if ($request->hasFile('foto')) {
            if ($about->foto) {
                Storage::disk('public')->delete($about->foto);
            }
            $data['foto'] = $request->file('foto')->store('abouts', 'public');
        } elseif ($request->delete_foto && $about->foto) {
            Storage::disk('public')->delete($about->foto);
            $data['foto'] = null;
        }

        $data['aktif'] = $request->boolean('aktif');

        $about->fill($data);
        $about->save();

        return redirect()->route('admin.about.edit')->with('success', 'About berhasil diperbarui.');
    }
}
