<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PetitionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\AdminPetitionsController;
use App\Http\Controllers\Admin\AdminCategoriesController;
use App\Http\Controllers\Admin\AdminUsersController;

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


    Route::get('mypetitions', 'listMine')->name('petitions.mine')->middleware('auth');

    Route::post('petitions/sign/{id}', 'sign')->name('petitions.sign')->middleware('auth');
    Route::get('petitionsSigned', 'petitionsSigned')->name('petitions.petitionssigned')->middleware('auth');
    Route::get('petition/add', 'create')->name('petitions.edit-add')->middleware('auth');
    Route::post('petition', 'store')->name('petitions.store');

    Route::get('petitions/edit/{id}', 'edit')->name('petitions.edit')->middleware('auth');
    Route::put('petitions/{id}', 'update')->name('petitions.update')->middleware('auth');
    Route::delete('petitions/{id}', 'delete')->name('petitions.destroy')->middleware('auth');
});

Route::middleware('admin')->group(function () {
    Route::get('admin', [AdminPetitionsController::class, 'index'])->name('admin.home');

    Route::controller(AdminPetitionsController::class)->group(function () {
        Route::get('admin/petitions/{id}', 'show')->name('adminpetitions.show');
        Route::get('admin/petitions/edit/{id}', 'edit')->name('adminpetitions.edit');
        Route::delete('admin/petitions/{id}', 'delete')->name('adminpetitions.delete');
        Route::put('admin/petitions/{id}', 'update')->name('adminpetitions.update');
        Route::put('admin/petitions/estado/{id}', 'cambiarEstado')->name('adminpetitions.estado');
    });

    Route::controller(AdminCategoriesController::class)->group(function () {
        Route::get('admin/categories', 'index')->name('admin.categories.index');
        Route::get('admin/categories/create', 'create')->name('admin.categories.create');
        Route::post('admin/categories', 'store')->name('admin.categories.store');
        Route::get('admin/categories/edit/{id}', 'edit')->name('admin.categories.edit');
        Route::put('admin/categories/{id}', 'update')->name('admin.categories.update');
        Route::delete('admin/categories/{id}', 'delete')->name('admin.categories.delete');
    });

    Route::controller(AdminUsersController::class)->group(function () {
        Route::get('admin/users', 'index')->name('admin.users.index');
        Route::get('admin/users/create', 'create')->name('admin.users.create');
        Route::post('admin/users', 'store')->name('admin.users.store');
        Route::get('admin/users/edit/{id}', 'edit')->name('admin.users.edit');
        Route::put('admin/users/{id}', 'update')->name('admin.users.update');
        Route::delete('admin/users/{id}', 'delete')->name('admin.users.delete');
    });
});

require __DIR__.'/auth.php';
