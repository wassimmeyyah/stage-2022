<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\PersonnelacadController;
use App\Http\Controllers\PorteurController;
use App\Http\Controllers\ExperimentationController;

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
})->name("goHome");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/etablissement',[EtablissementController::class, 'show'])->name("goEtablissement");

Route::get('/etablissement4',[EtablissementController::class, 'show2'])->name("goEtablissement2");

Route::get('/etablissement/ajouter',[EtablissementController::class, 'create'])->name("goEtablissementAjouter");

Route::post('/etablissement/ajouter',[EtablissementController::class, 'store'])->name("goEtablissementAjouter");

Route::get('/etablissement/{etablissement}',[EtablissementController::class, 'edit'])->name("goEtablissementModifier");

Route::put('/etablissement/{etablissement}',[EtablissementController::class, 'update'])->name("goEtablissementModifier");

Route::delete('/etablissement/{etablissement}',[EtablissementController::class, 'delete'])->name("goEtablissementSupprimer");

Route::get('/etablissement/{etablissement}/affichage', [EtablissementController::class, 'affiche'])->name("goEtablissementAffichage");

Route::get('search', [EtablissementController::class, 'search'])->name("goEtablissementSearch");

Route::get('/filtre1', [EtablissementController::class, 'filtre'])->name("goEtablissementFiltre");

Route::get('/etablissement/{etablissement}/telechargement1-pdf', [EtablissementController::class, 'telechargerPdf'])->name("goEtablissementPDF");




Route::get('/porteur',[PorteurController::class, 'show'])->name("goPorteur");

Route::get('/porteur/ajouter',[PorteurController::class, 'create'])->name("goPorteurAjouter");

Route::post('/porteur/ajouter',[PorteurController::class, 'store'])->name("goPorteurAjouter");

Route::get('/porteur/{porteur}',[PorteurController::class, 'edit'])->name("goPorteurModifier");

Route::put('/porteur/{porteur}',[PorteurController::class, 'update'])->name("goPorteurModifier");

Route::delete('/porteur/{porteur}',[PorteurController::class, 'delete'])->name("goPorteurSupprimer");

Route::get('/porteur/{porteur}/affichage', [PorteurController::class, 'affiche'])->name("goPorteurAffichage");

Route::get('search2', [PorteurController::class, 'search'])->name("goPorteurSearch");

Route::get('/porteur/{porteur}/telechargement2-pdf', [PorteurController::class, 'telechargerPdf'])->name("goPorteurPDF");




Route::get('/personnelacad',[PersonnelacadController::class, 'show'])->name("goPersonnelacad");

Route::get('/personnelacad/ajouter',[PersonnelacadController::class, 'create'])->name("goPersonnelacadAjouter");

Route::post('/personnelacad/ajouter',[PersonnelacadController::class, 'store'])->name("goPersonnelacadAjouter");

Route::get('/personnelacad/{personnelacad}',[PersonnelacadController::class, 'edit'])->name("goPersonnelacadModifier");

Route::put('/personnelacad/{personnelacad}',[PersonnelacadController::class, 'update'])->name("goPersonnelacadModifier");

Route::delete('/personnelacad/{personnelacad}',[PersonnelacadController::class, 'delete'])->name("goPersonnelacadSupprimer");

Route::get('/personnelacad/{personnelacad}/affichage', [PersonnelacadController::class, 'affiche'])->name("goPersonnelacadAffichage");

Route::get('search3', [PersonnelacadController::class, 'search'])->name("goPersonnelacadSearch");

Route::get('/personnelacad/{personnelacad}/telechargement2-pdf', [PersonnelacadController::class, 'telechargerPdf'])->name("goPersonnelacadPDF");



Route::get('/experimentation2', function () {return view('experimentationRecherche');})->name("goExperimentation2");

Route::get('/experimentation',[ExperimentationController::class, 'show'])->name("goExperimentation");

Route::get('/experimentation/ajouter',[ExperimentationController::class, 'create'])->name("goExperimentationAjouter");

Route::post('/experimentation/ajouter',[ExperimentationController::class, 'store'])->name("goExperimentationAjouter");

Route::get('/experimentation/{experimentation}',[ExperimentationController::class, 'edit'])->name("goExperimentationModifier");

Route::put('/experimentation/{experimentation}',[ExperimentationController::class, 'update'])->name("goExperimentationModifier");

Route::delete('/experimentation/{experimentation}',[ExperimentationController::class, 'delete'])->name("goExperimentationSupprimer");

Route::get('/experimentation/{experimentation}/affichage', [ExperimentationController::class, 'affiche'])->name("goExperimentationAffichage");

Route::get('/search4', [ExperimentationController::class, 'search'])->name("goExperimentationSearch");

Route::get('/recherche', [ExperimentationController::class, 'recherche'])->name("goExperimentationRecherche");

Route::get('/experimentation/{experimentation}/telechargement4-pdf', [ExperimentationController::class, 'telechargerPdf'])->name("goExperimentationPDF");
