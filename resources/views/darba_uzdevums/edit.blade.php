@extends('layouts.app')

@section('content')
<h1>Rediģēt darba uzdevumu: {{ $u->uzdevuma_kods }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('darba_uzdevums.update', $u->id) }}" method="POST">
    @csrf
    @method('PUT')

    <h3>Pamatinformācija</h3>
    
    <label><strong>Uzdevuma kods:</strong></label>
    <input type="text" id="uzdevuma_kods" class="form-control @error('uzdevuma_kods') is-invalid @enderror" name="uzdevuma_kods" value="{{ old('uzdevuma_kods', $u->uzdevuma_kods) }}"><br>
    @error('uzdevuma_kods') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Statuss:</strong></label>
    <input type="text" id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status', $u->status) }}"><br>
    @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Klients (ID):</strong></label>
    <input type="number" id="klienta_id" class="form-control @error('klienta_id') is-invalid @enderror" name="klienta_id" value="{{ old('klienta_id', $u->klienta_id) }}"><br>
    @error('klienta_id') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Aprīkojums</h3>

    <label><strong>Aprīkojuma nosaukums:</strong></label>
    <input type="text" id="aprikojuma_nosaukums" class="form-control @error('aprikojuma_nosaukums') is-invalid @enderror" name="aprikojuma_nosaukums" value="{{ old('aprikojuma_nosaukums', $u->aprikojuma_nosaukums) }}"><br>
    @error('aprikojuma_nosaukums') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Aprīkojuma tips (ID):</strong></label>
    <input type="number" id="aprikojuma_tips_id" class="form-control @error('aprikojuma_tips_id') is-invalid @enderror" name="aprikojuma_tips_id" value="{{ old('aprikojuma_tips_id', $u->aprikojuma_tips_id) }}"><br>
    @error('aprikojuma_tips_id') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Uzņemšana</h3>

    <label><strong>Uzņemšanas adrese:</strong></label>
    <input type="text" id="uznemsanas_adrese" class="form-control @error('uznemsanas_adrese') is-invalid @enderror" name="uznemsanas_adrese" value="{{ old('uznemsanas_adrese', $u->uznemsanas_adrese) }}"><br>
    @error('uznemsanas_adrese') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Uzņemšanas datums un laiks:</strong></label>
    <input type="datetime-local" id="uznemsanas_dt" class="form-control @error('uznemsanas_dt') is-invalid @enderror" name="uznemsanas_dt" value="{{ old('uznemsanas_dt', $u->uznemsanas_dt ? \Carbon\Carbon::parse($u->uznemsanas_dt)->format('Y-m-d\TH:i') : '') }}"><br>
    @error('uznemsanas_dt') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Piegāde</h3>

    <label><strong>Piegādes adrese:</strong></label>
    <input type="text" id="piegades_adrese" class="form-control @error('piegades_adrese') is-invalid @enderror" name="piegades_adrese" value="{{ old('piegades_adrese', $u->piegades_adrese) }}"><br>
    @error('piegades_adrese') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Piegādes datums un laiks:</strong></label>
    <input type="datetime-local" id="piegades_dt" class="form-control @error('piegades_dt') is-invalid @enderror" name="piegades_dt" value="{{ old('piegades_dt', $u->piegades_dt ? \Carbon\Carbon::parse($u->piegades_dt)->format('Y-m-d\TH:i') : '') }}"><br>
    @error('piegades_dt') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Piegādes darbnieks (ID):</strong></label>
    <input type="number" id="piegades_darbinieks" class="form-control @error('piegades_darbinieks') is-invalid @enderror" name="piegades_darbinieks" value="{{ old('piegades_darbinieks', $u->piegades_darbinieks) }}"><br>
    @error('piegades_darbinieks') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Piegādes transports:</strong></label>
    <input type="text" id="piegades_transports" class="form-control @error('piegades_transports') is-invalid @enderror" name="piegades_transports" value="{{ old('piegades_transports', $u->piegades_transports) }}"><br>
    @error('piegades_transports') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Attālums (km):</strong></label>
    <input type="number" step="0.01" id="attalums_km" class="form-control @error('attalums_km') is-invalid @enderror" name="attalums_km" value="{{ old('attalums_km', $u->attalums_km) }}"><br>
    @error('attalums_km') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Ligums un pakalpojums</h3>

    <label><strong>Liguma termiņš:</strong></label>
    <input type="datetime-local" id="liguma_termins" class="form-control @error('liguma_termins') is-invalid @enderror" name="liguma_termins" value="{{ old('liguma_termins', $u->liguma_termins ? \Carbon\Carbon::parse($u->liguma_termins)->format('Y-m-d\TH:i') : '') }}"><br>
    @error('liguma_termins') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Pakalpojuma apraksts:</strong></label>
    <textarea id="pakalpojuma_apraksts" class="form-control @error('pakalpojuma_apraksts') is-invalid @enderror" name="pakalpojuma_apraksts" rows="4">{{ old('pakalpojuma_apraksts', $u->pakalpojuma_apraksts) }}</textarea><br>
    @error('pakalpojuma_apraksts') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Cena:</strong></label>
    <input type="number" step="0.01" id="cena" class="form-control @error('cena') is-invalid @enderror" name="cena" value="{{ old('cena', $u->cena) }}"><br>
    @error('cena') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Uzstāde</h3>

    <label><strong>Uzstādes darbnieks (ID):</strong></label>
    <input type="number" id="uzstadisanas_darbinieks" class="form-control @error('uzstadisanas_darbinieks') is-invalid @enderror" name="uzstadisanas_darbinieks" value="{{ old('uzstadisanas_darbinieks', $u->uzstadisanas_darbinieks) }}"><br>
    @error('uzstadisanas_darbinieks') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Uzstādes datums un laiks:</strong></label>
    <input type="datetime-local" id="uzstadisanas_dt" class="form-control @error('uzstadisanas_dt') is-invalid @enderror" name="uzstadisanas_dt" value="{{ old('uzstadisanas_dt', $u->uzstadisanas_dt ? \Carbon\Carbon::parse($u->uzstadisanas_dt)->format('Y-m-d\TH:i') : '') }}"><br>
    @error('uzstadisanas_dt') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Uzstādes komentārs:</strong></label>
    <textarea id="uzstadisanas_komentars" class="form-control @error('uzstadisanas_komentars') is-invalid @enderror" name="uzstadisanas_komentars" rows="4">{{ old('uzstadisanas_komentars', $u->uzstadisanas_komentars) }}</textarea><br>
    @error('uzstadisanas_komentars') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Faili un dokumenti</h3>

    <label><strong>Faila tips:</strong></label>
    <input type="text" id="faila_tips" class="form-control @error('faila_tips') is-invalid @enderror" name="faila_tips" value="{{ old('faila_tips', $u->faila_tips) }}"><br>
    @error('faila_tips') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Faila ceļš:</strong></label>
    <input type="text" id="faila_cels" class="form-control @error('faila_cels') is-invalid @enderror" name="faila_cels" value="{{ old('faila_cels', $u->faila_cels) }}"><br>
    @error('faila_cels') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <h3>Atbildība un papildus informācija</h3>

    <label><strong>Atbildīgais darbnieks (ID):</strong></label>
    <input type="number" id="atbildigais_darbinieks_id" class="form-control @error('atbildigais_darbinieks_id') is-invalid @enderror" name="atbildigais_darbinieks_id" value="{{ old('atbildigais_darbinieks_id', $u->atbildigais_darbinieks_id) }}"><br>
    @error('atbildigais_darbinieks_id') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Parole:</strong></label>
    <input type="text" id="parole" class="form-control @error('parole') is-invalid @enderror" name="parole" value="{{ old('parole', $u->parole) }}"><br>
    @error('parole') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <label><strong>Komentārs:</strong></label>
    <textarea id="komentars" class="form-control @error('komentars') is-invalid @enderror" name="komentars" rows="3">{{ old('komentars', $u->komentars) }}</textarea><br>
    @error('komentars') <span class="invalid-feedback">{{ $message }}</span> @enderror

    <button type="submit" class="btn btn-primary">Saglabāt</button>
    <a href="{{ route('darba_uzdevums') }}" class="btn btn-secondary">Atcelt</a>
</form>

@endsection
