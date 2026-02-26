@extends('layouts.app')

@section('content')
<h1>Rediģēt aprīkojuma tipu: {{ $a->tips }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('aprikojums.update', $a->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="tips" class="fw-bold">Tips:</label>
        <input type="text" class="form-control @error('tips') is-invalid @enderror" id="tips" name="tips" value="{{ old('tips', $a->tips) }}" required>
        @error('tips')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div><br><br>

    <button type="submit" class="btn btn-primary">Saglabāt</button>
    <a href="{{ route('aprikojuma_tipi') }}" class="btn btn-secondary">Atcelt</a>
</form>

@endsection
