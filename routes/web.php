<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessTripController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TrainingCourseController;
use App\Http\Controllers\YoungEconomistController;

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

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/index', [Controller::class, 'getBusinessTripCounts'])->name('index.getBusinessTripCounts');
    Route::get('/business_trips', [BusinessTripController::class,'index'])->name('business_trips.index');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('training_courses', TrainingCourseController::class);
});

Route::middleware(['auth', 'role:editor'])->group(function () {
    // Route::get('/index', function () {
    //     return 'Page2';
    // });
    Route::resource('business_trips', BusinessTripController::class);
});

Route::middleware(['auth', 'role:moderator'])->group(function () {
    Route::get('/page3', function () {
        return 'Page3';
    });
});

Route::middleware(['auth', 'role:author'])->group(function () {
    Route::get('/page4', function () {
        return 'Page4';
    });
});

Route::middleware(['auth', 'role:subscriber'])->group(function () {
    Route::resource('young_economists', YoungEconomistController::class);
});





require __DIR__.'/auth.php';
