@extends('layouts.app')

@section('content')
<h1>Uzdevuma kods: {{ $u->uzdevuma_kods }}</h1>

<div class="card">
    <div class="card-body">
        <p><strong>ID:</strong> {{ $u->id }}</p>
        <p><strong>Klients:</strong> {{ $u->klients ? $u->klients->vards . ' ' . $u->klients->uzvards : 'Nav klienta' }}</p>
        <p><strong>Aprīkojuma nosaukums:</strong> {{ $u->aprikojuma_nosaukums }}</p>
        <p><strong>Aprīkojuma tips ID:</strong> {{ $u->aprikojuma_tips_id }}</p>
        <p><strong>Uzņemšanas adrese:</strong> {{ $u->uznemsanas_adrese }}</p>
        <p><strong>Uzņemšanas datums:</strong> {{ $u->uznemsanas_dt }}</p>
        <p><strong>Piegādes adrese:</strong> {{ $u->piegades_adrese }}</p>
        <p><strong>Piegādes datums:</strong> {{ $u->piegades_dt }}</p>
        <p><strong>Piegādes darbinieks:</strong> {{ $u->piegades_darbinieks }}</p>
        <p><strong>Piegādes transports:</strong> {{ $u->piegades_transports }}</p>
        <p><strong>Attalums km:</strong> {{ $u->attalums_km }}</p>
        <p><strong>Līguma termiņš:</strong> {{ $u->liguma_termins }}</p>
        <p><strong>Pakalpojuma apraksts:</strong> {{ $u->pakalpojuma_apraksts }}</p>
        <p><strong>Uzstādīšanas darbinieks:</strong> {{ $u->uzstadisanas_darbinieks }}</p>
        <p><strong>Uzstādīšanas datums:</strong> {{ $u->uzstadisanas_dt }}</p>
        <p><strong>Uzstādīšanas komentars:</strong> {{ $u->uzstadisanas_komentars }}</p>
        <p><strong>Cena:</strong> {{ $u->cena }}</p>
        <p><strong>Komentārs:</strong> {{ $u->komentars }}</p>
        <p><strong>Atbildīgais darbinieks ID:</strong> {{ $u->atbildigais_darbinieks_id }}</p>
        <p><strong>Statuss:</strong> {{ $u->status }}</p>
        <p><strong>Uzdevuma kods:</strong> {{ $u->uzdevuma_kods }}</p>
        <p><strong>Parole:</strong> {{ $u->parole }}</p>
        
    </div>
</div>

<a href="{{ route('darba_uzdevums.edit', $u->id) }}" class="btn btn-warning mt-3">Rediģēt</a>
<a href="{{ route('darba_uzdevums') }}" class="btn btn-secondary mt-3">Atpakaļ</a>

@endsection
