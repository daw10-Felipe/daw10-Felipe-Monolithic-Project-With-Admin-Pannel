<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;




Route::get('/', [PagesController::class, 'home']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/users/firmas', [UserController::class,'petitionsFirmadas'])
    ->middleware('auth');


Route::controller(PetitionController::class)->group(function () {
    Route::get('petitions/index', 'index')->name('petitions.index');
    Route::get('petitions/{id}', 'show')->name('petitions.show');
    Route::get('mypetitions', 'listMine')->name('petitions.index')->middleware('auth');
    Route::post('petitions/sign/{id}', 'sign')->name('petitions.sign')->middleware('auth');
    Route::get('petitionsSigned', 'petitionsSigned')->name('petitions.petitionssigned')->middleware('auth');
    Route::get('petition/add', 'create')->name('petitions.edit-add')->middleware('auth');
    Route::post('petition', 'store')->name('petitions.store');


    Route::get('petitions/edit/{id}', 'edit')->name('petitions.edit');
    Route::put('petitions/{id}', 'update')->name('petitions.update');
    Route::delete('petitions/{id}', 'delete')->name('petitions.delete');
});


require __DIR__.'/auth.php';
