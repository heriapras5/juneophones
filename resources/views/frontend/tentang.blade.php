@extends('layouts.frontend')

@section('meta_title', 'Tentang Juneo Phone Service')
@section('meta_desc', 'Kenali lebih dekat Juneo Phone Service — ahlinya service HP Android & iPhone. Berpengalaman, terpercaya, dan bergaransi.')

@section('content')
    <x-page-header page="tentang" icon="building" label="Tentang" title="Kenali Juneo Phone" subtitle="Ahlinya Service HP Android & iPhone — Berpengalaman, Terpercaya, dan Bergaransi." />
    @include('components.about-section')
    @include('components.footer-section')
@endsection
