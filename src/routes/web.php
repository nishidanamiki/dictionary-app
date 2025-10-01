<?php

use Database\Seeders\DictionarySeeder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;

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

//Route::get('/', function () {
//return view('welcome');
//});
Route::get('/', [DictionaryController::class, 'index'])->name('dictionaries.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/dictionaries/create', [DictionaryController::class, 'create'])->name('dictionaries.create');
    Route::post('/dictionaries', [DictionaryController::class, 'store'])->name('dictionaries.store');
    Route::patch('/dictionaries/{id}', [DictionaryController::class, 'update'])->name('dictionaries.update');
    Route::delete('/dictionaries/{id}', [DictionaryController::class, 'destroy'])->name('dictionaries.destroy');
});
