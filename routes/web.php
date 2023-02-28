<?php

use App\Http\Controllers\DashAdminController;
use App\Http\Controllers\DataAdminController;
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

// Route::get('/dashboard', function () {
//     return view('webadmin.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

       Route::middleware(['auth:sanctum','verified','adminweb'])->group(function(){
        Route::get('/dataadmin', [DataAdminController::class, 'DataAdmin']);
        Route::get('/dashboard', [DashAdminController::class, 'dashadmin']);
        Route::post('/update-status/{id}', [DataAdminController::class, 'updateStatus'])->name('update.status');
        
        Route::post('/deleteadmin/{id}',[DataAdminController::class,'deleteadmin'])->name('deleteadmin');
        Route::get('/cek', [DataAdminController::class, 'lihat']);
    

    });

    Route::middleware(['auth:sanctum','verified','adminDesa'])->group(function(){
        
        


    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
