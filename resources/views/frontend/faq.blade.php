@extends('layouts.frontend')

@section('meta_title', 'FAQ — Pertanyaan Umum Juneo Phone')
@section('meta_desc', 'Temukan jawaban untuk pertanyaan yang sering diajukan tentang layanan service HP di Juneo Phone.')

@section('content')
<x-page-header page="faq" icon="question-circle" label="FAQ" title="Pertanyaan Umum" subtitle="Temukan jawaban untuk pertanyaan yang sering diajukan." />

<!-- Proses Service -->
<section class="relative -mt-10 z-20 max-w-5xl mx-auto px-4 mb-10">
    <div class="grid sm:grid-cols-2 gap-4">
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-stone-200/60 card-hover">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-50 to-green-50 flex items-center justify-center text-emerald-600 shrink-0">
                    <i class="fas fa-clock text-lg"></i>
                </div>
                <div>
                    <h3 class="font-display font-semibold text-stone-900 mb-1">Kerusakan Ringan</h3>
                    <p class="text-sm text-stone-500 mb-3">Charging port, tombol, software ringan, pembersihan internal — bisa ditunggu</p>
                    <div class="flex items-center gap-2 text-xs text-emerald-600 font-medium">
                        <i class="fas fa-hourglass-half"></i>
                        Estimasi 15–30 Menit
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl p-6 shadow-xl border border-stone-200/60 card-hover">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600 shrink-0">
                    <i class="fas fa-tools text-lg"></i>
                </div>
                <div>
                    <h3 class="font-display font-semibold text-stone-900 mb-1">Kerusakan Berat</h3>
                    <p class="text-sm text-stone-500 mb-3">Ganti LCD, ganti baterai, mainboard, terkena cairan — butuh sparepart</p>
                    <div class="flex items-center gap-2 text-xs text-amber-600 font-medium">
                        <i class="fas fa-hourglass-half"></i>
                        Estimasi 1–2 Hari (Tinggalkan HP / Opname)
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @include('components.faq-section')

    @include('components.footer-section')
@endsection
