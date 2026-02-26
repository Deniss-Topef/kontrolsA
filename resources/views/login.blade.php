
@extends ('layouts.app')

@section('content')

@section('pazi')



@endsection

<h1>Pievienoties</h1>
<form method="POST" action="/loginp">
    @csrf
    
    <!--paziņojus-->
@if($errors->has('login'))
    <div class="alert alert-danger">
        {{ $errors->first('login') }}
    </div>

@endif

        <label for="lietotajvards " class="form-label">Login</label></br>
        <input type="text" class="form-control" id="lietotajvards" name="lietotajvards"></br>

        <label for="parole" class="form-label">Parole:</label></br>
        <input type="password" class="form-control" id="parole" name="parole"></br>

        <button type="submit" class="btn btn-outline-dark">Ielogoties</button>
        <a href="/" class="btn btn-info" > Atpakaļ</a>
    <form>


@endsection