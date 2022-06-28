<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\TentorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\TentorDashboardController;
use App\Http\Controllers\StudentDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return redirect()->route('mainpage');
});
Route::get('/siswa', [StudentDashboardController::class, 'index'])->middleware('guest')->name('mainpage');

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});

Route::post('/login', [AuthController::class, 'loginProcess']);
Route::post('/register', [AuthController::class, 'registerProcess']);


Route::middleware(['auth', 'user-access:siswa'])->group(function () {
    Route::get('/siswa/dashboard', [StudentDashboardController::class, 'studentDashboard'])->name('student.dashboard');
    Route::get('/siswa/tentor', [StudentDashboardController::class, 'studentDashboard'])->name('student.tentor');
    Route::get('/siswa/mapel', [StudentDashboardController::class, 'studentDashboard'])->name('student.subject');
    Route::get('/siswa/profil', [StudentDashboardController::class, 'studentDashboard'])->name('student.profile');
    Route::get('/siswa/pengaturan', [StudentDashboardController::class, 'studentDashboard'])->name('student.settings');
});
Route::post('/siswa/logout', [AuthController::class, 'logout'])->name('student.logout');

Route::middleware(['auth', 'user-access:tentor'])->group(function () {
    Route::get('/tentor/dashboard', [TentorDashboardController::class, 'tentorDashboard'])->name('tentor.dashboard');
});
Route::post('/tentor/logout', [AuthController::class, 'logout'])->name('tentor.logout');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::controller(TentorController::class)->group(function () {
        Route::get('/admin/tentor', 'index')->name('tentor.index');
        // Route::get('/admin/tentor/create', 'create')->name('tentor.create');
        // Route::post('/admin/tentor/', 'store')->name('tentor.store');
        // Route::put('/admin/tentor/{tentorId:id}', 'update')->name('tentor.update');
        Route::get('/admin/tentor/{tentorId:kode_tentor}', 'show')->name('tentor.show');
        // Route::get('/admin/tentor/{tentorId:id}/edit', 'edit')->name('tentor.edit');
        // Route::delete('/admin/tentor/{tentorId:id}', 'destroy')->name('tentor.destroy');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::get('/admin/siswa', 'index')->name('student.index');
        // Route::get('/admin/siswa/create', 'create')->name('student.create');
        // Route::post('/admin/siswa/', 'store')->name('student.store');
        // Route::put('/admin/siswa/{siswaId:id}', 'update')->name('student.update');
        Route::get('/admin/siswa/{siswaId:id}', 'show')->name('student.show');
        // Route::get('/admin/siswa/{siswaId:id}/edit', 'edit')->name('student.edit');
        // Route::delete('/admin/siswa/{siswaId:id}', 'destroy')->name('student.destroy');
    });

    Route::controller(SubjectController::class)->group(function () {
        Route::get('/admin/mapel', 'index')->name('subject.index');
        Route::get('/admin/mapel/create', 'create')->name('subject.create');
        Route::post('/admin/mapel/', 'store')->name('subject.store');
        Route::put('/admin/mapel/{mapelId:id}', 'update')->name('subject.update');
        Route::get('/admin/mapel/{mapelId:id}', 'show')->name('subject.show');
        Route::get('/admin/mapel/{mapelId:id}/edit', 'edit')->name('subject.edit');
        Route::delete('/admin/mapel/{mapelId:id}', 'destroy')->name('subject.destroy');
    });

    Route::controller(LevelController::class)->group(function () {
        Route::get('/admin/tingkat', 'index')->name('level.index');
        Route::get('/admin/tingkat/create', 'create')->name('level.create');
        Route::post('/admin/tingkat/', 'store')->name('level.store');
        Route::put('/admin/tingkat/{jenjangId:id}', 'update')->name('level.update');
        Route::get('/admin/tingkat/{jenjangId:id}', 'show')->name('level.show');
        Route::get('/admin/tingkat/{jenjangId:id}/edit', 'edit')->name('level.edit');
        Route::delete('/admin/tingkat/{jenjangId:id}', 'destroy')->name('level.destroy');
    });
});

Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
