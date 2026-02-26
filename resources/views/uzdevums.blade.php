<!-- saite tiek parsutita uz mapi "layouts" uz lappu "app"  -->
@extends ('layouts.app')


<!-- saite ietapa sekciju "data" kas iekša satur <p>  -->
@section('content')

@section('pazi')

<!--paziņojus-->
<div class="alert alert-info">
@if(session('success'))
{{ session('success') }}
</div>
@endif

@endsection
 <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold"> Atpakaļ</a>
<table>
    <tr>
        <td>uzd</td>
        <td>a</td>
        <td>a</td>
    </tr>
</table>

@endsection