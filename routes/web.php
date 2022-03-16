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

use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\PersonnelacadController;
use App\Http\Controllers\PorteurController;

Route::get('/', function () {
    return view('welcome');
})->name("goHome");


Route::get('/etablissement',[EtablissementController::class, 'show'])->name("goEtablissement");

Route::get('/etablissement/ajouter',[EtablissementController::class, 'create'])->name("goEtablissementAjouter");

Route::post('/etablissement/ajouter',[EtablissementController::class, 'store'])->name("goEtablissementAjouter");

Route::get('/etablissement/{etablissement}',[EtablissementController::class, 'edit'])->name("goEtablissementModifier");

Route::put('/etablissement/{etablissement}',[EtablissementController::class, 'update'])->name("goEtablissementModifier");

Route::delete('/etablissement/{etablissement}',[EtablissementController::class, 'delete'])->name("goEtablissementSupprimer");

Route::get('/search', [EtablissementController::class, 'search'])->name("goEtablissmementSearch");



Route::get('/porteur',[PorteurController::class, 'show'])->name("goPorteur");

Route::get('/porteur/ajouter',[PorteurController::class, 'create'])->name("goPorteurAjouter");

Route::post('/porteur/ajouter',[PorteurController::class, 'store'])->name("goPorteurAjouter");

Route::get('/porteur/{porteur}',[PorteurController::class, 'edit'])->name("goPorteurModifier");

Route::put('/porteur/{porteur}',[PorteurController::class, 'update'])->name("goPorteurModifier");

Route::delete('/porteur/{porteur}',[PorteurController::class, 'delete'])->name("goPorteurSupprimer");


Route::get('/personnelacad',[PersonnelacadController::class, 'show'])->name("goPersonnelacad");

Route::get('/personnelacad/ajouter',[PersonnelacadController::class, 'create'])->name("goPersonnelacadAjouter");

Route::post('/personnelacad/ajouter',[PersonnelacadController::class, 'store'])->name("goPersonnelacadAjouter");

Route::get('/personnelacad/{personnelacad}',[PersonnelacadController::class, 'edit'])->name("goPersonnelacadModifier");

Route::put('/personnelacad/{personnelacad}',[PersonnelacadController::class, 'update'])->name("goPersonnelacadModifier");

Route::delete('/personnelacad/{personnelacad}',[PersonnelacadController::class, 'delete'])->name("goPersonnelacadSupprimer");

//Route::get('/experimentation',[employeController::class, 'show'])->name("goExperimentation");


