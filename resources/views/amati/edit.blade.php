@extends('layouts.app')

@section('content')
<h1>Rediģēt amatu: {{ $amats->amats }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('amati.update', $amats->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="amats" class="fw-bold">Amats:</label>
        <input type="text" class="form-control @error('amats') is-invalid @enderror" id="amats" name="amats" value="{{ old('amats', $amats->amats) }}" required>
        @error('amats')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br><br>

    <button type="submit" class="btn btn-primary">Saglabāt</button>
    <a href="{{ route('amati') }}" class="btn btn-secondary">Atcelt</a>
</form>

@endsection
