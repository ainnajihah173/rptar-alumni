<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\InquiriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__ . '/auth.php';


//guest routes
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    //Profile
    Route::get('/profile/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/staff/alumni-profile', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/alumni-profile/details', [StaffController::class, 'show'])->name('staff.show');

    //Dashboard 
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    //Manage Users for admin
    Route::resource('user', UserController::class);

    //Manage News
    Route::resource('news', NewsController::class);
    Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');

    //Manage Events
    Route::resource('events', EventsController::class);
    Route::put('/events/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::get('/events/{id}/approve', [EventsController::class, 'approve'])->name('events.approve');
    Route::get('/events/{id}/reject', [EventsController::class, 'reject'])->name('events.reject');

    //Manage Inquiries
    Route::resource('inquiries', InquiriesController::class);

    //Manage Donations


    //Manage Communications


});







