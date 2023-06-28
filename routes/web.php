<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('activity/{activity}/start', [App\Http\Controllers\ActivityController::class, 'start'])
        ->name('activity.start');
    Route::get('activity/{activity}/finish', [App\Http\Controllers\ActivityController::class, 'finish'])
        ->name('activity.finish');

    Route::resources([
        'user' => UserController::class,
        'project' => ProjectController::class,
        'activity' => ActivityController::class
    ]);

    Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline.index');
    Route::get('/timeline/activity', [App\Http\Controllers\TimelineController::class, 'activity'])
        ->name('timeline.activity');
});

require __DIR__ . '/auth.php';
