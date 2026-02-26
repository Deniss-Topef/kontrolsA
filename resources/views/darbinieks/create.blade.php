@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <form action="/darbinieks/createe" method="post">
        @csrf
        

        <h1>Pievienot jaunu darbinieku</h1>
        <div class="container" style="max-width: 60%">

        @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <label for="vards" class="form-label">Vārds:</label><br>
            <input type="text" id="vards" class="form-control @error('vards') is-invalid @enderror" name="vards" value="{{ old('vards') }}">
            @error('vards') <div class="invalid-feedback">{{ $message }}</div> @enderror<br>

            <label for="uzvards" class="form-label">Uzvārds:</label><br>
            <input type="text" id="uzvards" class="form-control @error('uzvards') is-invalid @enderror" name="uzvards" value="{{ old('uzvards') }}">
            @error('uzvards') <div class="invalid-feedback">{{ $message }}</div> @enderror<br>

            <label for="dzimsanas_d" class="form-label">Dzimšanas datums:</label><br>
            <input type="date" id="dzimsanas_d" class="form-control @error('dzimsanas_d') is-invalid @enderror" name="dzimsanas_d" value="{{ old('dzimsanas_d') }}">
            @error('dzimsanas_d') <div class="invalid-feedback">{{ $message }}</div> @enderror<br>

            <label for="darba_uzsaka_d" class="form-label">Darba sākuma datums:</label><br>
            <input type="date" id="darba_uzsaka_d" class="form-control @error('darba_uzsaka_d') is-invalid @enderror" name="darba_uzsaka_d" value="{{ old('darba_uzsaka_d') }}"><br>

            <label for="amati_id" class="form-label">Amats:</label><br>
            <select id="amati_id" class="form-control @error('amati_id') is-invalid @enderror" name="amati_id">
                @foreach($amati as $a)
                    <option value="{{ $a->id }}">{{ $a->amats }}</option>
                @endforeach
            </select><br>

            <label for="tel_num" class="form-label">Telefona numurs:</label><br>
            <input type="text" id="tel_num" class="form-control @error('tel_num') is-invalid @enderror" name="tel_num" value="{{ old('tel_num') }}">
            @error('tel_num') <div class="invalid-feedback">{{ $message }}</div> @enderror<br>

            <label for="e_pasts" class="form-label">E-pasts:</label><br>
            <input type="email" id="e_pasts" class="form-control @error('e_pasts') is-invalid @enderror" name="e_pasts" value="{{ old('e_pasts') }}"><br>

            <label for="lietotajvards" class="form-label">Lietotājvārds:</label><br>
            <input type="text" id="lietotajvards" class="form-control @error('lietotajvards') is-invalid @enderror" name="lietotajvards" value="{{ old('lietotajvards') }}"><br>

            <label for="parole" class="form-label">Parole:</label><br>
            <input type="text" id="parole" class="form-control @error('parole') is-invalid @enderror" name="parole"><br>

            <label for="komentars" class="form-label">Komentārs:</label><br>
            <textarea id="komentars" class="form-control" name="komentars"></textarea><br><br>

            <button type="submit" class="btn btn-success">Saglabāt</button>
            <a href="/darbinieks" class="btn btn-danger">Atcelt</a>

        </div>
    </form>
</div>
@endsection