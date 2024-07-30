<?php

use App\Http\Controllers\Admin\DashboarController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::middleware('auth', 'verified')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {

    Route::get('/', [DashboarController::class, 'index'])->name('dashboard');

    //? Recources Project:
    Route::resource('projects', ProjectController::class)
    //* chiamo la rotta con lo slug e non con l'id:
    ->parameters(['projects' => 'project:slug']);

    //? Recources Type:
    Route::resource('types', TypeController::class)
    //* chiamo la rotta con lo slug e non con l'id:
    ->parameters(['types' => 'type:slug']);

    //? Recources Technology:
    Route::resource('technologies', TechnologyController::class)
    //* chiamo la rotta con lo slug e non con l'id:
    ->parameters(['technologies' => 'technology:slug']);
    
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';