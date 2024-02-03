<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
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

Route::get('/', [CharactersController::class, 'index'])->name('index');
Route::get('characters/{id}', [CharactersController::class, 'show'])->name('characters.show');

Route::get('/search-name', [CharactersController::class, 'searchByName'])->name('search.autocomplete.name');
Route::get('/search-house', [CharactersController::class, 'searchByHouse'])->name('search.autocomplete.house');


Route::get('test', function () {
    echo phpinfo();
});
