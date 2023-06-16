<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\reportController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/home', function () {
    return view('home');
})->name('home');


Route::middleware(['key'])->group(function (){
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('report', [reportController::class, 'show'])->name('report');
});
Route::get('/contact', function () {
    return view('contactus');
})->name('contactus');

Route::get('Albab', 'hellow Albab');
