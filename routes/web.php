<?php

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
use App\Http\Controllers\employeController;
use App\Http\Controllers\laboratoireController;

Route::get('/', function () {
    return view('welcome');
})->name("goHome");


Route::get('/laboratoire',[laboratoireController::class, 'show'])->name("goLaboratoire");

Route::get('/laboratoire/ajouter',[laboratoireController::class, 'create'])->name("goLaboratoireAjouter");

Route::post('/laboratoire/ajouter',[laboratoireController::class, 'store'])->name("goLaboratoireAjouter");

Route::get('/laboratoire/modifier',[laboratoireController::class, 'up'])->name("goLaboratoireModifier");

Route::post('/laboratoire/modifier',[laboratoireController::class, 'update'])->name("goLaboratoireModifier");

Route::get('/employe',[employeController::class, 'show'])->name("goEmploye");


