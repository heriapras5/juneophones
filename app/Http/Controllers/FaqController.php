<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('pertanyaan', 'like', "%{$search}%")
                  ->orWhere('jawaban', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('aktif', $request->status);
        }

        $faqs = $query->orderBy('urutan')->paginate(10);
        return view('admin.faq', compact('faqs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'pertanyaan' => 'required|max:255',
            'jawaban' => 'required',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['pertanyaan'] = strip_tags($data['pertanyaan']);
        $data['jawaban'] = strip_tags($data['jawaban']);
        $data['aktif'] = $request->boolean('aktif');

        Faq::create($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $data = $request->validate([
            'pertanyaan' => 'required|max:255',
            'jawaban' => 'required',
            'urutan' => 'nullable|integer|min:0',
            'aktif' => 'boolean',
        ]);

        $data['pertanyaan'] = strip_tags($data['pertanyaan']);
        $data['jawaban'] = strip_tags($data['jawaban']);
        $data['aktif'] = $request->boolean('aktif');

        $faq->update($data);

        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();
        return redirect()->route('admin.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }

    public function reorder(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:faqs,id',
            'items.*.urutan' => 'required|integer|min:0',
        ]);

        foreach ($request->items as $item) {
            Faq::where('id', $item['id'])->update(['urutan' => $item['urutan']]);
        }

        return response()->json(['success' => true]);
    }
}
