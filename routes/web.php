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
    return redirect('activity');
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
    Route::get('activity/{activity}/delete', [App\Http\Controllers\ActivityController::class, 'destroy'])
        ->name('activity.delete');

    Route::get('user/{user}/delete', [App\Http\Controllers\UserController::class, 'destroy'])
        ->name('user.delete');

    Route::get('project/{project}/delete', [App\Http\Controllers\ProjectController::class, 'destroy'])
        ->name('project.delete');

    Route::resources(
        [
            'user' => UserController::class,
            'project' => ProjectController::class,
            'activity' => ActivityController::class
        ],
        [
            'except' => ['show', 'destroy']
        ]
    );

    Route::get('/timeline', [App\Http\Controllers\TimelineController::class, 'index'])->name('timeline.index');
    Route::post('/timeline/project', [App\Http\Controllers\TimelineController::class, 'project'])
        ->name('timeline.project');
});

require __DIR__ . '/auth.php';
