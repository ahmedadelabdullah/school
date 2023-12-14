<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\Auth\RegisteredUserController;



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

Route::middleware(['auth'])->group(function () {
    

// Start Admins Routes
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class , 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/admins/search', [AdminController::class , 'search'])->name('admin.admins.search');
    // Route::get('/admin/admins/add', [AdminController::class , 'add'])->name('admin.admins');

    Route::resource('admins', AdminController::class);

  });
// End Admins Routes

// Start Parents Routes
Route::middleware(['role:parent'])->group(function () {
    Route::get('/parent/dashboard', [ParentController::class, 'parentDashboard'])->name('parent.dashboard');
    // Route::get('/parent/logout', [ParentController::class , 'parentLogout'])->name('parent.logout');
});
// End Parents Routes

// Start students Routes
Route::middleware(['role:student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'studentDashboard'])->name('student.dashboard');
    // Route::get('/student/logout', [StudentController::class , 'studentLogout'])->name('student.logout');
});
// End students Routes

// Start teachers Routes
Route::middleware(['role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'teacherDashboard'])->name('teacher.dashboard');
    // Route::get('/teacher/logout', [StudentController::class , 'studentLogout'])->name('teacher.logout');
});
// End teachers Routes



 Route::resource('classes', ClassroomController::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';




Route::get('/user/logout', [AdminController::class , 'adminLogout'])->name('admin.logout');

