<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('g');
});

route::get('/login', function () {
    return view('login');
});

Route::post('/loginp','App\Http\Controllers\login@login');

route::get('/logout', function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');

})->name('logout');


route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/ligums', function () {
    return view('ligums');
})->name('aktiviLigumi');

Route::get('/uzdevums', function () {
    return view('uzdevums');
})->name('planotieUzdevumi');

Route::get('/pazinojumi', function () {
    return view('pazinojumi');
})->name('pazinojumi');

Route::get('/kontakti', function () {
    return view('kontakti');
});


Route::get('/aprikojums/create', function () {
    return view('aprikojums.create');
});

Route::get('/amati/create', function () {
    return view('amati.create');
});

Route::get('/klients/create', function () {
    return view('klients.create');
});

Route::get('/darbinieks/create', function () {
    return view('darbinieks.create');
});

Route::get('/darba_uzdevums/create', function () {
    return view('darba_uzdevums.create');
});




Route::get('/atskaites', [\App\Http\Controllers\amatiController::class, 'all'])->name('atskaites');

Route::get('/darbinieks/create', 'App\Http\Controllers\darbinieksController@showNewDarbForm');
Route::get('/darba_uzdevums/create', 'App\Http\Controllers\darba_uzdevumsController@showNewUzdForm');


Route::get('/klients', [\App\Http\Controllers\klientsController::class, 'izvadit'])->name('klients');
Route::get('/klients/{id}', [\App\Http\Controllers\klientsController::class, 'show'])->name('klients.show');
Route::get('/klients/{id}/edit', [\App\Http\Controllers\klientsController::class, 'edit'])->name('klients.edit');
Route::put('/klients/{id}', [\App\Http\Controllers\klientsController::class, 'update'])->name('klients.update');
Route::delete('/klients/{id}', [\App\Http\Controllers\klientsController::class, 'destroy'])->name('klients.destroy');
Route::post('/klients/createe', 'App\Http\Controllers\klientsController@create');

Route::get('/amati', [\App\Http\Controllers\amatiController::class, 'izvadit'])->name('amati');
Route::get('/amati/{id}/edit', [\App\Http\Controllers\amatiController::class, 'edit'])->name('amati.edit');
Route::put('/amati/{id}', [\App\Http\Controllers\amatiController::class, 'update'])->name('amati.update');
Route::delete('/amati/{id}', [\App\Http\Controllers\amatiController::class, 'destroy'])->name('amati.destroy');
Route::post('/amati/createe', 'App\Http\Controllers\amatiController@create');

Route::get('/aprikojums', [\App\Http\Controllers\aprikojuma_tipiController::class, 'izvadit'])->name('aprikojuma_tipi');
Route::get('/aprikojums/{id}/edit', [\App\Http\Controllers\aprikojuma_tipiController::class, 'edit'])->name('aprikojums.edit');
Route::put('/aprikojums/{id}', [\App\Http\Controllers\aprikojuma_tipiController::class, 'update'])->name('aprikojums.update');
Route::delete('/aprikojums/{id}', [\App\Http\Controllers\aprikojuma_tipiController::class, 'destroy'])->name('aprikojums.destroy');
Route::post('/aprikojums/createe', 'App\Http\Controllers\aprikojuma_tipiController@create');

Route::get('/darba_uzdevums', [\App\Http\Controllers\darba_uzdevumsController::class, 'izvadit'])->name('darba_uzdevums');
Route::get('/darba_uzdevums/{id}', [\App\Http\Controllers\darba_uzdevumsController::class, 'show'])->name('darba_uzdevums.show');
Route::get('/darba_uzdevums/{id}/edit', [\App\Http\Controllers\darba_uzdevumsController::class, 'edit'])->name('darba_uzdevums.edit');
Route::put('/darba_uzdevums/{id}', [\App\Http\Controllers\darba_uzdevumsController::class, 'update'])->name('darba_uzdevums.update');
Route::delete('/darba_uzdevums/{id}', [\App\Http\Controllers\darba_uzdevumsController::class, 'destroy'])->name('darba_uzdevums.destroy');
Route::post('/darba_uzdevums/createe', 'App\Http\Controllers\darba_uzdevumsController@create');

Route::get('/darbinieks', [\App\Http\Controllers\darbinieksController::class, 'izvadit'])->name('darbinieks');
Route::get('/darbinieks/{id}', [\App\Http\Controllers\darbinieksController::class, 'show'])->name('darbinieks.show');
Route::get('/darbinieks/{id}/edit', [\App\Http\Controllers\darbinieksController::class, 'edit'])->name('darbinieks.edit');
Route::put('/darbinieks/{id}', [\App\Http\Controllers\darbinieksController::class, 'update'])->name('darbinieks.update');
Route::delete('/darbinieks/{id}', [\App\Http\Controllers\darbinieksController::class, 'destroy'])->name('darbinieks.destroy');
Route::post('/darbinieks/createe', 'App\Http\Controllers\darbinieksController@create');