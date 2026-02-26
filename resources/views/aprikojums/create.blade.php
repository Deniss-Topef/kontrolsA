@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <form action="/aprikojums/createe" method="post">
        @csrf

        <h1>Pievienot jaunu aprikojuma tipu</h1>
        <div class="container" style="max-width: 60%">

            <label for="tips" class="form-label">Aprikojuma tips:</label><br>
            <input type="text" id="tips" 
                   class="form-control @error('tips') is-invalid @enderror" 
                   name="tips" 
                   value="{{ old('tips') }}">
            @error('tips')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <button type="submit" class="btn btn-success">Saglabāt</button>
            <a href="/aprikojums" class="btn btn-danger">Atcelt</a>

        </div>
    </form>
</div>
@endsection
