@extends('layouts.app')

@section('content')
 <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold"> Atpakaļ</a>


<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Amati</h1>
    <a href="/amati/create" class="btn btn-primary">Pievienot amatu</a>
</div>


@if(isset($amati) && $amati->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Amats</th>
                <th>Darbības</th>
            </tr>
        </thead>
        <tbody>
        @foreach($amati as $a)
            <tr>
                <td>{{ $a->id }}</td>
                <td>{{ $a->amats }}</td>
                <td>
                    <a href="{{ route('amati.edit', $a->id) }}" class="btn btn-sm btn-warning">Rediģēt</a>
                    <form action="{{ route('amati.destroy', $a->id) }}" method="POST" style="display:inline;">
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
    <p>Amatu saraksts ir tukšs.</p>
@endif

@endsection
