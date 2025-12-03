<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PagesController::class, 'home']);

Route::get('/users/firmas', [\App\Http\Controllers\UserController::class,'petitionsFirmadas'])
    ->middleware('auth');

Route::controller(\App\Http\Controllers\PetitionController::class)->group(function () {
    Route::get('petitions/index', 'index')->name('petitions.index');
    Route::get('petitions/{id}', 'show')->name('petitions.show');
    Route::get('mispetitions', 'listMine')->name('petitions.mine');
    Route::get('petitionsfirmadas', 'petitionsFirmadas')->name('petitions.petitionsfirmadas');
    Route::get('peticion/add', 'create')->name('petitions.create');
    Route::post('peticion', 'store')->name('petitions.store');

    Route::post('petitions/firmar/{id}', 'firmar')->name('petitions.firmar');
    Route::get('petitions/edit/{id}', 'edit')->name('petitions.edit');
    Route::put('petitions/{id}', 'update')->name('petitions.update');
    Route::delete('petitions/{id}', 'delete')->name('petitions.delete');

});
