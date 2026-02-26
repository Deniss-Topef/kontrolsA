@extends('layouts.app')

@section('content')
<div class="alert alert-info">
    <form action="/amati/createe" method="post">
        @csrf

        <h1>Pievienot jaunu amatu</h1>
        <div class="container" style="max-width: 60%">

            <label for="amats" class="form-label">Amats:</label><br>
            <input type="text" id="amats" 
                   class="form-control @error('amats') is-invalid @enderror" 
                   name="amats" 
                   value="{{ old('amats') }}">
            @error('amats')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <br>

            <button type="submit" class="btn btn-success">Saglabāt</button>
            <a href="/amati" class="btn btn-danger">Atcelt</a>

        </div>
    </form>
</div>
@endsection