<?php

use App\Http\Controllers\CandidatureController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\ProfileController;
use App\Models\Offre;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $offres = Offre::paginate(10);

    return view('welcome', compact('offres'));
});
Route::get('/offre', [OffreController::class, 'offre'])->name('offre');
Route::get('/search', [OffreController::class, 'search'])->name('search');


Route::get('/dashboard', function () {
    $offres = Offre::paginate(10);

    return view('dashboard', compact('offres'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin', [ProfileController::class, 'admin'])->name('profile.admin');

    Route::resource('offres', OffreController::class);
    Route::resource('candidatures', CandidatureController::class);
    //supprimer candidature
    Route::delete('/candidatures/{$id}', [CandidatureController::class, 'destroy'])->name('candidatures.destroy');
    Route::post('/candidature/{id}/accepter',  [CandidatureController::class, 'accepter'])->name('candidature.accepter');
    Route::post('/candidature/{id}/refuser', [CandidatureController::class, 'refuser'])->name('candidature.refuser');
    

});



require __DIR__ . '/auth.php';
