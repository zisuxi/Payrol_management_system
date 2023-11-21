<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\ReportController;
use App\Models\Authentication;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/', 'showlogin');
    Route::post('/login', 'doLogin');
    Route::get('/register', 'index');
    Route::post('/signup', 'store');
});
Route::group(["middleware" => ["authsecurity"]], function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/dashboard', "dasboard");
        Route::get('/logout', 'doLogout');
    });
    Route::get("/Statuschange/{id}", [CategoryController::class, "Statuschange"]);
    Route::resource('/category', CategoryController::class);
    Route::resource("/staff", StaffController::class);
    Route::get('/report', [ReportController::class, 'GetReport']);

    Route::get('/viewDetail/{id}', [StaffController::class, 'showdetail']);
    Route::resource("/ledger", LedgerController::class);
    Route::get("/getincomeCategory", [LedgerController::class, "incomeCategory"]);
    Route::get("/getexpenceCategroy", [LedgerController::class, "expenceCategory"]);
    Route::post('apply_filters', [ReportController::class, 'myFuncton'])->name('apply_filters');
    Route::post("filterNow",[ReportController::class,"compareFunction"])->name('filterNow');
});
