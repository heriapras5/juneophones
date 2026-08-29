<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('aktif', $request->status);
        }

        $layanan = $query->orderBy('urutan')->paginate(10);
        return view('admin.layanan', compact('layanan'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:255|unique:services',
            'icon' => 'nullable|max:100',
            'deskripsi' => 'nullable',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['nama'] = strip_tags($data['nama']);
        $data['deskripsi'] = isset($data['deskripsi']) ? strip_tags($data['deskripsi']) : null;
        $data['aktif'] = $request->boolean('aktif');
        $data['icon'] = $data['icon'] ?? 'fas fa-tools';

        Service::create($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|max:255|unique:services,nama,' . $id,
            'icon' => 'nullable|max:100',
            'deskripsi' => 'nullable',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['nama'] = strip_tags($data['nama']);
        $data['deskripsi'] = isset($data['deskripsi']) ? strip_tags($data['deskripsi']) : null;
        $data['aktif'] = $request->boolean('aktif');

        $service->update($data);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:services,id',
            'items.*.urutan' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Service::where('id', $item['id'])->update(['urutan' => $item['urutan']]);
        }

        return response()->json(['success' => true]);
    }
}
