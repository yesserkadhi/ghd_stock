<?php

use App\Models\Entree;
use App\Models\Categorie;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EntreeController;
use App\Http\Controllers\SortieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\UserController;


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
})->name('home')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('Produit', ProduitController::class)->middleware('auth');
Route::resource('Role', RoleController::class)->middleware('auth');
Route::resource('Entree', EntreeController::class)->middleware('auth');
Route::resource('Ligne', LigneController::class)->middleware('auth');
Route::resource('User', UserController::class)->middleware('auth');

Route::resource('Sortie', SortieController::class)->middleware('auth');
Route::resource('Categorie', CategorieController::class)->middleware('auth');

Route::model('role', 'Role');
Route::model('entree', 'Entree');
// Assuming you have a route group for authenticated users
Route::middleware(['auth'])->group(function () {
    // Route to display lines for a specific entry
    Route::get('/entrees/{entree_id}/lignes', [LigneController::class, 'index'])->name('lignes.index');

    // Routes for creating a new line
    Route::get('/entrees/{entree_id}/lignes/create', [LigneController::class, 'create'])->name('lignes.create');
    Route::post('/entrees/{entree_id}/lignes', [LigneController::class, 'store'])->name('lignes.store');

    // Routes for editing and updating a line
    Route::get('/entrees/{entree_id}/lignes/{ligne_id}/edit', [LigneController::class, 'edit'])->name('lignes.edit');
    Route::put('/entrees/{entree_id}/lignes/{ligne_id}', [LigneController::class, 'update'])->name('lignes.update');

    // Route for deleting a line
    Route::delete('/entrees/{entree_id}/lignes/{ligne_id}', [LigneController::class, 'destroy'])->name('lignes.destroy');
});