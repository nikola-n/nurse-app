<?php

use App\Http\Livewire\BloodPressure\BloodPressureCreate;
use App\Http\Livewire\BloodPressure\BloodPressureEdit;
use App\Http\Livewire\Patients\PatientCreate;
use App\Http\Livewire\Patients\PatientEdit;
use App\Models\Patient;
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
    return view('dashboard');
})->name('dashboard');

Route::get('patients', function (){
    return view('patients.index');
})->name('patients.index');

Route::get('patients/create', PatientCreate::class)->name('patients.create');

Route::get('patients/{patient}', function (Patient $patient){
    return view('patients.show', compact('patient'));
})->name('patients.show');

Route::get('patients/{patient}/edit', PatientEdit::class)->name('patients.edit');

Route::get('patients/{patient}/readings/create', BloodPressureCreate::class)->name('patients.readings.create');
Route::get('patients/{patient}/readings/{reading}/edit', BloodPressureEdit::class)->name('patients.readings.edit');
