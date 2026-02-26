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

<div class="grid grid-cols-2 gap-6 p-6">

    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Aktīvie līgumi</h3>
        <a href="/ligums">
            <div class="bg-gray-100 rounded-lg overflow-hidden h-48 flex items-center justify-center">
                <img src="{{ asset('images/test.jpg') }}" alt="Contracts" class="w-full h-full object-cover">
            </div>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Plānotie uzdevumi</h3>
        <a href="/darba_uzdevums">
            <div class="bg-gray-100 rounded-lg overflow-hidden h-48 flex items-center justify-center">
                <img src="{{ asset('images/test.jpg') }}" alt="Tasks" class="w-full h-full object-cover">
            </div>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Paziņojumi</h3>
        <a href="/pazinojumi">
            <div class="bg-gray-100 rounded-lg overflow-hidden h-48 flex items-center justify-center">
                <img src="{{ asset('images/test.jpg') }}" alt="Notifications" class="w-full h-full object-cover">
            </div>
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
        <h3 class="text-2xl font-bold mb-4 text-gray-800">Atskaites</h3>
        <a href="/atskaites">
            <div class="bg-gray-100 rounded-lg overflow-hidden h-48 flex items-center justify-center">
                <img src="{{ asset('images/test.jpg') }}" alt="Reports" class="w-full h-full object-cover">
            </div>
        </a>
    </div>

</div>


@endsection