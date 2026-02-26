@extends('layouts.app')

@section('content')
<h1>Rediģēt klientu: {{ $klient->vards }} {{ $klient->uzvards }}</h1>


<form action="{{ route('klients.update', $klient->id) }}" method="POST">
    @csrf
    @method('PUT')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="form-group">
        <label for="vards" class="fw-bold">Vārds:</label>
        <input type="text" class="form-control @error('vards') is-invalid @enderror" id="vards" name="vards" value="{{ old('vards', $klient->vards) }}" required>
        @error('vards')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="uzvards" class="fw-bold">Uzvārds:</label>
        <input type="text" class="form-control @error('uzvards') is-invalid @enderror" id="uzvards" name="uzvards" value="{{ old('uzvards', $klient->uzvards) }}" required>
        @error('uzvards')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="tel_num" class="fw-bold">Telefons:</label>
        <input type="text" class="form-control @error('tel_num') is-invalid @enderror" id="tel_num" name="tel_num" value="{{ old('tel_num', $klient->tel_num) }}">
        @error('tel_num')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="e_pasts" class="fw-bold">E-pasts:</label>
        <input type="email" class="form-control @error('e_pasts') is-invalid @enderror" id="e_pasts" name="e_pasts" value="{{ old('e_pasts', $klient->e_pasts) }}" required>
        @error('e_pasts')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="adrese" class="fw-bold">Adrese:</label>
        <input type="text" class="form-control @error('adrese') is-invalid @enderror" id="adrese" name="adrese" value="{{ old('adrese', $klient->adrese) }}">
        @error('adrese')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br>

    <div class="form-group">
        <label for="komentars" class="fw-bold">Komentārs:</label>
        <textarea class="form-control @error('komentars') is-invalid @enderror" id="komentars" name="komentars">{{ old('komentars', $klient->komentars) }}</textarea>
        @error('komentars')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br><br>

    <button type="submit" class="btn btn-primary">Saglabāt</button>
    <a href="{{ route('klients') }}" class="btn btn-secondary">Atcelt</a>
</form>

@endsection
