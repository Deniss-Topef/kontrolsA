@extends('layouts.app')

@section('content')
 <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold"> Atpakaļ</a>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Klienti</h1>
    <a href="/klients/create" class="btn btn-primary">Pievienot klientu</a>
</div>

@if(isset($klients) && $klients->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>Telefons</th>
                <th>Komentārs</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
        @foreach($klients as $k)
            <tr>
                <td>{{ $k->vards }}</td>
                <td>{{ $k->uzvards }}</td>
                <td>{{ $k->tel_num }}</td>
                <td>{{ $k->komentars }}</td>
                <td>
                    <a href="{{ route('klients.show', $k->id) }}" class="btn btn-sm btn-info">Apskatīt</a>
                    <a href="{{ route('klients.edit', $k->id) }}" class="btn btn-sm btn-warning">Rediģēt</a>
                    <form action="{{ route('klients.destroy', $k->id) }}" method="POST" style="display:inline;">
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
    <p>Klientu saraksts ir tukšs.</p>
@endif

@endsection
