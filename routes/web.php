<?php

use App\Http\Controllers\componentes;
use App\Http\Controllers\detalle_mantenimiento;
use App\Http\Controllers\equipos;
use App\Http\Controllers\mantenimientos;
use App\Http\Controllers\personascontroller;
use App\Http\Controllers\usuarios;
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

Route::get('/', function () {
    return view('layout.index');
});

Route::get('/get/personas', [personascontroller::class, 'show']);
Route::post('/create/personas', [personascontroller::class, 'create']);
Route::put('/update/personas', [personascontroller::class, 'update']);

Route::get('/get/usuarios', [usuarios::class, 'show']);
Route::post('/create/usuarios', [usuarios::class, 'create']);
Route::put('/update/usuarios', [usuarios::class, 'update']);

Route::get('/get/equipos', [equipos::class, 'show']);
Route::post('/create/equipos', [equipos::class, 'create']);
Route::put('/update/equipos', [equipos::class, 'update']);

Route::get('/get/componentes', [componentes::class, 'show']);
Route::post('/create/componentes', [componentes::class, 'create']);
Route::put('/update/componentes', [componentes::class, 'update']);

Route::get('/get/mantenimientos', [mantenimientos::class, 'show']);
Route::get('/get/mantenimientos/day', [mantenimientos::class, 'getMantenimientoByDay']);
Route::get('/get/mantenimientos/type', [mantenimientos::class, 'getTypeMantenimiento']);
Route::post('/create/mantenimientos', [mantenimientos::class, 'create']);
Route::put('/update/mantenimientos', [mantenimientos::class, 'update']);

Route::get('/get/det_mantenimiento', [detalle_mantenimiento::class, 'show']);
