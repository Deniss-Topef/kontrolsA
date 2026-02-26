@extends('layouts.app')

@section('content')
<h1>Darbinieks: {{ $d->vards }} {{ $d->uzvards }}</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $d->id }}</p>
        <p><strong>Vārds:</strong> {{ $d->vards }}</p>
        <p><strong>Uzvārds:</strong> {{ $d->uzvards }}</p>
        <p><strong>Dzimšanas datums:</strong> {{ $d->dzimsanas_d }}</p>
        <p><strong>Darba uzsākšanas datums:</strong> {{ $d->darba_uzsaka_d }}</p>
        <p><strong>Amata nosaukums:</strong> {{ $d->amats ? $d->amats->amats : 'Nav amata' }}</p>
        <p><strong>Telefons:</strong> {{ $d->tel_num }}</p>
        <p><strong>E-pasts:</strong> {{ $d->e_pasts }}</p>
        <p><strong>Lietotājvārds:</strong> {{ $d->lietotajvards }}</p>
        <p><strong>Komentārs:</strong> {{ $d->komentars }}</p>
    </div>
</div>

<a href="{{ route('darbinieks.edit', $d->id) }}" class="btn btn-warning mt-3">Rediģēt</a>
<a href="{{ route('darbinieks') }}" class="btn btn-secondary mt-3">Atpakaļ</a>

@endsection
