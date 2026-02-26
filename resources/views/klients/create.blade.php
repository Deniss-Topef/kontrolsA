@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <form action="/klients/createe" method="post">
        @csrf

        <h1>Pievienot jaunu klientu</h1>
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

            <label for="vards" class="form-label">Vārds:</label>
            <input type="text" id="vards" class="form-control @error('vards') is-invalid @enderror" name="vards" value="{{ old('vards') }}">
            @error('vards') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label for="uzvards" class="form-label">Uzvārds:</label>
            <input type="text" id="uzvards" class="form-control @error('uzvards') is-invalid @enderror" name="uzvards" value="{{ old('uzvards') }}">
            @error('uzvards') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label for="tel_num" class="form-label">Telefona numurs:</label>
            <input type="text" id="tel_num" class="form-control @error('tel_num') is-invalid @enderror" name="tel_num" value="{{ old('tel_num') }}">
            @error('tel_num') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label for="e_pasts" class="form-label">E-pasts:</label>
            <input type="email" id="e_pasts" class="form-control @error('e_pasts') is-invalid @enderror" name="e_pasts" value="{{ old('e_pasts') }}">
            @error('e_pasts') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label for="adrese" class="form-label">Adrese:</label>
            <input type="text" id="adrese" class="form-control @error('adrese') is-invalid @enderror" name="adrese" value="{{ old('adrese') }}">
            @error('adrese') <div class="invalid-feedback">{{ $message }}</div> @enderror

            <label for="komentars" class="form-label">Komentārs:</label>
            <textarea id="komentars" class="form-control @error('komentars') is-invalid @enderror" name="komentars">{{ old('komentars') }}</textarea>
            @error('komentars') <div class="invalid-feedback">{{ $message }}</div> @enderror<br>

            <button type="submit" class="btn btn-success">Saglabāt</button>
            <a href="/klients" class="btn btn-danger">Atcelt</a>

        </div>
    </form>
</div>
@endsection