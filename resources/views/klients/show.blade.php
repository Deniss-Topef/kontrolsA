@extends('layouts.app')

@section('content')
<h1>Klients: {{ $klient->vards }} {{ $klient->uzvards }}</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $klient->id }}</p>
        <p><strong>Vārds:</strong> {{ $klient->vards }}</p>
        <p><strong>Uzvārds:</strong> {{ $klient->uzvards }}</p>
        <p><strong>Telefons:</strong> {{ $klient->tel_num }}</p>
        <p><strong>E-pasts:</strong> {{ $klient->e_pasts }}</p>
        <p><strong>Adrese:</strong> {{ $klient->adrese }}</p>
        <p><strong>Komentārs:</strong> {{ $klient->komentars }}</p>
    </div>
</div>

<a href="{{ route('klients.edit', $klient->id) }}" class="btn btn-warning mt-3">Rediģēt</a>
<a href="{{ route('klients') }}" class="btn btn-secondary mt-3">Atpakaļ</a>

@endsection
