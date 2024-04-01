<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\InfirmierController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\ConsultationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/medecin/setAvailability', [MedecinController::class, 'setAvailability']);
Route::post('/medecin/prescribe', [MedecinController::class, 'prescribe']);
Route::post('/medecin/addAssistant', [MedecinController::class, 'addAssistant']);

Route::post('/infirmier/scheduleAppointment', [InfirmierController::class, 'scheduleAppointment']);
Route::delete('/infirmier/cancelAppointment/{id}', [InfirmierController::class, 'cancelAppointment']);
Route::get('/infirmier/showCalendar', [InfirmierController::class, 'showCalendar']);

Route::get('/ordonnances', [OrdonnanceController::class, 'index']);
Route::post('/ordonnances', [OrdonnanceController::class, 'store']);
Route::get('/ordonnances/{id}', [OrdonnanceController::class, 'show']);
Route::put('/ordonnances/{id}', [OrdonnanceController::class, 'update']);
Route::delete('/ordonnances/{id}', [OrdonnanceController::class, 'destroy']);

Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::post('/patients', [PatientController::class, 'store']);
Route::put('/patients/{id}', [PatientController::class, 'update']);
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);
Route::get('/search', [PatientController::class, 'search']);

Route::get('/medicaments', [MedicamentController::class, 'index']);
Route::post('/medicaments', [MedicamentController::class, 'store']);
Route::get('/medicaments/{id}', [MedicamentController::class, 'show']);
Route::put('/medicaments/{id}', [MedicamentController::class, 'update']);
Route::delete('/medicaments/{id}', [MedicamentController::class, 'destroy']);

Route::post('/hospital', [HospitalController::class, 'store']);
Route::put('/hospital/{id}', [HospitalController::class, 'update']);
Route::delete('/hospital/{id}', [HospitalController::class, 'destroy']);

Route::get('/consultations', [ConsultationController::class, 'index']);
Route::post('/consultations', [ConsultationController::class, 'store']);
Route::get('/consultations/{id}', [ConsultationController::class, 'show']);
Route::put('/consultations/{id}', [ConsultationController::class, 'update']);
Route::delete('/consultations/{id}', [ConsultationController::class, 'destroy']);

Route::get('/accounts', [AccountController::class, 'index']);
Route::get('/accounts/{id}', [AccountController::class, 'show']);
Route::post('/accounts', [AccountController::class, 'store']);
Route::put('/accounts/{id}', [AccountController::class, 'update']);
Route::delete('/accounts/{id}', [AccountController::class, 'destroy']);