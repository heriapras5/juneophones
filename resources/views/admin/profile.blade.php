@extends('layouts.admin')

@section('title', 'Profil')
@section('subtitle', 'Kelola profil admin')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white border border-stone-200/60 rounded-2xl shadow-sm p-6 lg:p-8">
        <div class="flex items-center gap-3 mb-6">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-50 to-orange-50 flex items-center justify-center text-amber-600">
                <i class="fas fa-user-cog"></i>
            </div>
            <div>
                <h3 class="text-base font-semibold text-stone-900 font-display">Profil Admin</h3>
                <p class="text-xs text-stone-400">Perbarui informasi akun Anda</p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required max="255"
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    @error('name')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-stone-500 uppercase tracking-wider mb-1.5">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                           class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                    @error('email')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <hr class="border-stone-200">

                <div>
                    <p class="text-xs font-semibold text-stone-500 uppercase tracking-wider mb-3">Ganti Password <span class="text-stone-300 font-normal normal-case">(opsional)</span></p>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-medium text-stone-400 mb-1">Password Baru</label>
                            <input type="password" name="password" min="6"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                            @error('password')<p class="text-rose-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-stone-400 mb-1">Konfirmasi Password Baru</label>
                            <input type="password" name="password_confirmation" min="6"
                                   class="w-full px-4 py-2.5 bg-white border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-500/30 focus:border-amber-500 text-stone-900 outline-none text-sm transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-4 border-t border-stone-100">
                    <button type="submit"
                            class="btn-primary text-sm py-2.5 px-6 shadow-lg shadow-amber-500/25">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="text-sm text-stone-500 hover:text-stone-700 transition-colors px-4 py-2.5">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection