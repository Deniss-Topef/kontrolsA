@extends('layouts.app')

@section('content')
 <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold"> Atpakaļ</a>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Darbinieki</h1>
    <a href="/darbinieks/create" class="btn btn-primary">Pievienot darbinieku</a>
</div>



@if(isset($darbinieki) && $darbinieki->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>Amats</th>
                <th>Komentārs</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
        @foreach($darbinieki as $d)
            <tr>
                <td>{{ $d->vards }}</td>
                <td>{{ $d->uzvards }}</td>
                <td>{{ $d->amats ? $d->amats->amats : 'Nav amata' }}</td>
                <td>{{ $d->komentars }}</td>
                <td>
                    <a href="{{ route('darbinieks.show', $d->id) }}" class="btn btn-sm btn-info">Apskatīt</a>
                    <a href="{{ route('darbinieks.edit', $d->id) }}" class="btn btn-sm btn-warning">Rediģēt</a>
                    <form action="{{ route('darbinieks.destroy', $d->id) }}" method="POST" style="display:inline;">
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
    <p>Darbinieku saraksts ir tukšs.</p>
@endif

@endsection
