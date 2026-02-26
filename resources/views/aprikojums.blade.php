@extends('layouts.app')

@section('content')

 <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold"> Atpakaļ</a>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Aprīkojums</h1>
    <a href="/aprikojums/create" class="btn btn-primary">Pievienot aprikojumu</a>
</div>

@if(isset($aprikojums) && $aprikojums->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nosaukums</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
        @foreach($aprikojums as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->tips }}</td>
                <td>
                    <a href="{{ route('aprikojums.edit', $a->id) }}" class="btn btn-sm btn-warning">Rediģēt</a>
                    <form action="{{ route('aprikojums.destroy', $a->id) }}" method="POST" style="display:inline;">
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
    <p>Aprīkojuma saraksts ir tukšs.</p>
@endif

@endsection
