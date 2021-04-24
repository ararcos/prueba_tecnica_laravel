<?php

use App\Http\Controllers\CiudadController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['register'=>false,'reset' => false, 'verify' => false]);

Route::get('/', [UsuarioController::class, 'index'])->name('home');

Route::get('usuario', [UsuarioController::class, 'listar'])->name('usuarios');
Route::get('usuario/create', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('usuario/store', [UsuarioController::class, 'store'])->name('usuario.store');
Route::delete('usuario', [UsuarioController::class, 'delete'])->name('usuario.delete');
Route::put('usuario', [UsuarioController::class, 'update'])->name('usuario.update');


Route::get('estados/{id}', [CiudadController::class, 'estados'])->name('estados');
Route::get('ciudades/{id}', [CiudadController::class, 'ciudades'])->name('ciudades');

Route::get('emails',[EmailController::class,'index'])->name('email');
Route::get('emails/create',[EmailController::class,'create'])->name('email.create');
Route::post('emails',[EmailController::class,'store'])->name('email.enviar');






