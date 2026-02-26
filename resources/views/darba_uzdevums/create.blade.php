@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <form action="/darba_uzdevums/createe" method="post">
        @csrf

        <h1>Pievienot jaunu darba uzdevumu</h1>
        <div class="container" style="max-width: 60%">

            <label for="klienta_id" class="fw-bold" class="form-label">Klients:</label><br>
            <select id="klienta_id" class="form-control" name="klienta_id">
                @foreach($klienti as $k)
                    <option value="{{ $k->id }}">{{ $k->vards }} {{ $k->uzvards }}</option>
                @endforeach
            </select><br>

            <label for="aprikojuma_nosaukums" class="fw-bold" class="form-label">Aprikojuma nosaukums:</label><br>
            <input type="text" id="aprikojuma_nosaukums" class="form-control" name="aprikojuma_nosaukums"><br>

            <label for="aprikojuma_tips_id" class="fw-bold"  class="form-label">Aprikojuma tips:</label><br>
            <select id="aprikojuma_tips_id" class="form-control" name="aprikojuma_tips_id">
                @foreach($aprikojums as $a)
                    <option value="{{ $a->id }}">{{ $a->tips }}</option>
                @endforeach
            </select><br>

            <label for="uznemsanas_adrese" class="fw-bold" class="form-label">Uzņemsanas adrese:</label><br>
            <input type="text" id="uznemsanas_adrese" class="form-control" name="uznemsanas_adrese"><br>

            <label for="uznemsanas_dt" class="fw-bold"   class="form-label">Uzņemsanas datums:</label><br>
            <input type="date" id="uznemsanas_dt" class="form-control" name="uznemsanas_dt"><br>

            <label for="piegades_adrese" class="fw-bold" class="form-label">Piegādes adrese:</label><br>
            <input type="text" id="piegades_adrese" class="form-control" name="piegades_adrese"><br>

            <label for="piegades_dt" class="fw-bold" class="form-label">Piegādes datums:</label><br>
            <input type="date" id="piegades_dt" class="form-control" name="piegades_dt"><br>

            <label for="piegades_darbinieks" class="fw-bold" class="form-label">Piegādes darbinieks:</label><br>
            <select id="piegades_darbinieks" class="form-control" name="piegades_darbinieks">
                @foreach($darbinieki as $d)
                    <option value="{{ $d->id }}">{{ $d->vards }} {{ $d->uzvards }}</option>
                @endforeach
            </select><br>

            <label for="piegades_transports" class="fw-bold" class="form-label">Piegādes transports:</label><br>
            <input type="text" id="piegades_transports" class="form-control" name="piegades_transports"><br>

            <label for="attalums_km" class="fw-bold" class="form-label">Attālums (km):</label><br>
            <input type="float" id="attalums_km" class="form-control" name="attalums_km"><br>

            <label for="liguma_termins" class="fw-bold" class="form-label">Līguma termiņš:</label><br>
            <input type="date" id="liguma_termins" class="form-control" name="liguma_termins"><br>

            <label for="pakalpojuma_apraksts" class="fw-bold" class="form-label">Pakalpojuma apraksts:</label><br>
            <input type="text" id="pakalpojuma_apraksts" class="form-control" name="pakalpojuma_apraksts"><br>

            <label for="uzstadisanas_darbinieks" class="fw-bold" class="form-label">Uzstādīšanas darbinieks:</label><br>
            <select id="uzstadisanas_darbinieks" class="form-control" name="uzstadisanas_darbinieks">
                @foreach($darbinieki as $d)
                    <option value="{{ $d->id }}">{{ $d->vards }} {{ $d->uzvards }}</option>
                @endforeach
            </select><br>

            <label for="uzstadisanas_dt" class="fw-bold" class="form-label">Uzstādīšanas datums:</label><br>
            <input type="date" id="uzstadisanas_dt" class="form-control" name="uzstadisanas_dt"><br>

            <label for="uzstadisanas_komentars" class="fw-bold" class="form-label">Uzstādīšanas komentārs:</label><br>
            <input type="text" id="uzstadisanas_komentars" class="form-control" name="uzstadisanas_komentars"><br>

            <label for="cena" class="fw-bold" class="form-label">Cena:</label><br>
            <input type="float" id="cena" class="form-control" name="cena"><br>

            <label for="komentars" class="fw-bold" class="form-label">Komentārs:</label><br>
            <input type="text" id="komentars" class="form-control" name="komentars"><br>

            <label for="atbildigais_darbinieks_id" class="fw-bold" class="form-label">Uzstādīšanas darbinieks:</label><br>
            <select id="atbildigais_darbinieks_id" class="form-control" name="atbildigais_darbinieks_id">
                @foreach($darbinieki as $d)
                    <option value="{{ $d->id }}">{{ $d->vards }} {{ $d->uzvards }}</option>
                @endforeach
            </select><br>

            <label for="status" class="fw-bold" class="form-label">Statuss:</label><br>
            <input type="text" id="status" class="form-control" name="status"><br>

            <label for="uzdevuma_kods" class="fw-bold" class="form-label">Uzdevuma kods:</label><br>
            <input type="text" id="uzdevuma_kods" class="form-control" name="uzdevuma_kods"><br>

            <label for="parole" class="fw-bold" class="form-label">Parole:</label><br>
            <input type="password" id="parole" class="form-control" name="parole"><br><br>

            <button type="submit" class="btn btn-success">Saglabāt</button>
            <a href="/darba_uzdevums" class="btn btn-danger">Atcelt</a>

        </div>
    </form>
</div>
@endsection