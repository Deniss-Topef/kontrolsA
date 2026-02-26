@extends('layouts.app')

@section('content')
 <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold"> Atpakaļ</a>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Darba uzdevumi</h1>
    <a href="/darba_uzdevums/create" class="btn btn-primary">Pievienot darba uzdevumu</a>
</div>

@if(isset($uzdevumi) && $uzdevumi->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Uzdevuma kods</th>
                <th>Klients</th>
                <th>Aprīkojums</th>
                <th>Līguma termiņš</th>
                <!-- <th>Atbildigs darbinieks</th> -->
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
        @foreach($uzdevumi as $u)
            <tr>
                <td>{{ $u->uzdevuma_kods }}</td>
                <td>{{ $u->klients ? $u->klients->vards . ' ' . $u->klients->uzvards : 'Nav klienta' }}</td>
                <td>{{ $u->aprikojuma_nosaukums }}</td>
                <td>{{ date('Y-m-d', strtotime($u->liguma_termins)) }}</td>
                <!-- <td>{{ $u->atbildigais_darbinieks_id }}</td> -->
                <td>
                    <a href="{{ route('darba_uzdevums.show', $u->id) }}" class="btn btn-sm btn-info">Apskatīt</a>
                    <a href="{{ route('darba_uzdevums.edit', $u->id) }}" class="btn btn-sm btn-warning">Rediģēt</a>
                    <form action="{{ route('darba_uzdevums.destroy', $u->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Pārliecinieties')">Dzēst</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Darba uzdevumu saraksts ir tukšs.</p>
@endif

@endsection
