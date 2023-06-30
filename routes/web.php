<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categorias;
use App\Http\Livewire\Tareas;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/categorias', Categorias::class)->name('categorias');
    Route::get('/tareas', Tareas::class)->name('tareas');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/Introduccion', function () {
    return view('content.introduccion');
})->name('introduccion');
Route::get('/somos', function () {
    return view('content.somos');
})->name('somos');


Route::get('enviar', ['as' => 'enviar', function () {
    $data = ['link' => 'https://mailtrap.io/'];
    \Mail::send('emails.notificacion', $data, function ($message) {
        $message->from('fuuzze@gmail.com', 'MailTrap.Io');
        $message->to('recupera@micorreo.com')->subject('Correo de Recuperación');
    });
    return "Se envío el email";
}]);
