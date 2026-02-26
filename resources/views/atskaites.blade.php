<!-- saite tiek parsutita uz mapi "layouts" uz lappu "app"  -->
@extends ('layouts.app')


<!-- saite ietapa sekciju "data" kas iekša satur <p>  -->
@section('content')

@section('pazi')

<!--паziņojus-->
<div class="alert alert-info">
@if(session('success'))
{{ session('success') }}
</div>
@endif

@endsection
<a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800 font-semibold mb-6 inline-block"> Atpakaļ</a>

<div class="bg-white rounded-lg shadow-lg p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Atskaites - Amati sadaļa</h1>
    
    @if($amati->count())
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Amats</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($amati as $amats)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="border border-gray-300 px-4 py-2">{{ $amats->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $amats->amats }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded">
            <p>Iespējams, ka amati tabulā nav datu. Lūdzu, pievienojiet datus!</p>
        </div>
    @endif
</div>

@endsection