@extends('layouts.app')

@section('content')
<h1>Rediģēt darbinieku: {{ $d->vards }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('darbinieks.update', $d->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="vards" class="fw-bold">Vārds:</label>
        <input type="text" class="form-control @error('vards') is-invalid @enderror" id="vards" name="vards" value="{{ old('vards', $d->vards) }}" required>
        @error('vards')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="uzvards" class="fw-bold">Uzvārds:</label>
        <input type="text" class="form-control @error('uzvards') is-invalid @enderror" id="uzvards" name="uzvards" value="{{ old('uzvards', $d->uzvards) }}" required>
        @error('uzvards')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="dzimsanas_d" class="fw-bold">Dzimšanas datums:</label>
        <input type="date" class="form-control @error('dzimsanas_d') is-invalid @enderror" id="dzimsanas_d" name="dzimsanas_d" value="{{ old('dzimsanas_d', $d->dzimsanas_d) }}">
        @error('dzimsanas_d')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="darba_uzsaka_d" class="fw-bold">Darba uzsākšanas datums:</label>
        <input type="date" class="form-control @error('darba_uzsaka_d') is-invalid @enderror" id="darba_uzsaka_d" name="darba_uzsaka_d" value="{{ old('darba_uzsaka_d', $d->darba_uzsaka_d) }}">
        @error('darba_uzsaka_d')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="amati_id" class="fw-bold">Amats:</label>
        <select class="form-control @error('amati_id') is-invalid @enderror" id="amati_id" name="amati_id" required>
            <option value="">-- Izvēlies amatu --</option>
            @foreach($amati as $item)
                <option value="{{ $item->id }}" {{ $d->amati_id == $item->id ? 'selected' : '' }}>
                    {{ $item->amats }}
                </option>
            @endforeach
        </select>
        @error('amati_id')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="tel_num" class="fw-bold">Telefons:</label>
        <input type="text" class="form-control @error('tel_num') is-invalid @enderror" id="tel_num" name="tel_num" value="{{ old('tel_num', $d->tel_num) }}">
        @error('tel_num')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="e_pasts" class="fw-bold">E-pasts:</label>
        <input type="email" class="form-control @error('e_pasts') is-invalid @enderror" id="e_pasts" name="e_pasts" value="{{ old('e_pasts', $d->e_pasts) }}">
        @error('e_pasts')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="lietotajvards" class="fw-bold">Lietotājvārds:</label>
        <input type="text" class="form-control @error('lietotajvards') is-invalid @enderror" id="lietotajvards" name="lietotajvards" value="{{ old('lietotajvards', $d->lietotajvards) }}">
        @error('lietotajvards')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="parole" class="fw-bold">Parole:</label>
        <input type="text" class="form-control @error('parole') is-invalid @enderror" id="parole" name="parole" value="{{ old('parole', $d->parole) }}">
        <small class="form-text text-muted">Neaiztiekat, ja nevēlaties mainīt paroli</small>
        @error('parole')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="komentars" class="fw-bold">Komentārs:</label>
        <textarea class="form-control @error('komentars') is-invalid @enderror" id="komentars" name="komentars">{{ old('komentars', $d->komentars) }}</textarea>
        @error('komentars')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br><br>

    <button type="submit" class="btn btn-primary">Saglabāt</button>
    <a href="{{ route('darbinieks') }}" class="btn btn-secondary">Atcelt</a>
</form>

@endsection
