<?php

use App\Http\Controllers\MainController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/',[MainController::class,'index']);

Route::get('/voir_offre/{id}',[MainController::class,'findJob']);

Route::get('/toutes-les-offres-d-emplois',[MainController::class, 'showJobs']);

Route::get('/toutes-les-offres-de-stages',[MainController::class, 'showInternships']);

Route::get('/entreprises', [MainController::class,'showCompanies']);

Route::post('/apply',[MainController::class,'apply'])->name('apply');
