<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BuildController;
use App\Http\Controllers\TanahController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\OfficeController;

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

Route::get('/', [AuthController::class, 'login_admin'])->name('login');
Route::post('actionlogin', [AuthController::class, 'actionlogin'])->name('actionlogin');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['web', 'auth'])->group(
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
        Route::controller(DashboardController::class)->group(
            function () {
                Route::get('/dashboard',  'index')->name('dashboard.index');
            }
        );
        Route::controller(TanahController::class)->group(
            function () {
                Route::get('/tanah',  'index')->name('tanah.index');
                Route::get('/tanah/tambah',  'create')->name('tanah.create');
                Route::post('/tanah/store',  'store')->name('tanah.store');
                Route::delete('/tanah/{tanah}',  'destroy')->name('tanah.destroy');
                Route::get('/tanah/{tanah}/edit',  'edit')->name('tanah.edit');
                Route::put('/tanah/{tanah}/edit',  'update')->name('tanah.update');
            }
        );
        Route::controller(KendaraanController::class)->group(
            function () {
                Route::get('/kendaraan',  'index')->name('kendaraan.index');
                Route::get('/kendaraan/tambah',  'create')->name('kendaraan.create');
                Route::post('/kendaraan/store',  'store')->name('kendaraan.store');
                Route::delete('/kendaraan/{kendaraan}',  'destroy')->name('kendaraan.destroy');
                Route::get('/kendaraan/{kendaraan}/edit',  'edit')->name('kendaraan.edit');
                Route::put('/kendaraan/{kendaraan}/edit',  'update')->name('kendaraan.update');
            }
        );
        Route::controller(BuildController::class)->group(
            function () {
                Route::get('/bangunan',  'index')->name('build.index');
                Route::get('/bangunan/tambah',  'create')->name('build.create');
                Route::post('/bangunan/store',  'store')->name('build.store');
                Route::delete('/bangunan/{build}',  'destroy')->name('build.destroy');
                Route::get('/bangunan/{build}/edit',  'edit')->name('build.edit');
                Route::put('/bangunan/{build}/edit',  'update')->name('build.update');
            }
        );
        Route::controller(OfficeController::class)->group(
            function () {
                Route::get('/office',  'index')->name('office.index');
                Route::get('/office/tambah',  'create')->name('office.create');
                Route::post('/office/store',  'store')->name('office.store');
                Route::delete('/office/{office}',  'destroy')->name('office.destroy');
                Route::get('/office/{office}/edit',  'edit')->name('office.edit');
                Route::put('/office/{office}/edit',  'update')->name('office.update');
            }
        );
        Route::controller(ProyekController::class)->group(
            function () {
                Route::get('/project/{type_project:slug}',  'index')->name('project.index');
                Route::get('/project/{type_project:slug}/tambah',  'create')->name('project.create');
                Route::get('/project/{type_project:slug}/edit/{proyek}',  'edit')->name('project.edit');
                Route::post('/project/{type_project:slug}/store',  'store')->name('project.store');
                Route::delete('/project/{type_project:slug}/destroy/{proyek}',  'destroy')->name('project.destroy');
                Route::put('/project/{type_project:slug}/update/{proyek}',  'update')->name('project.update');
            }
        );
        Route::controller(ProjectController::class)->group(
            function () {
                Route::get('/kategori_project',  'index')->name('kategori_project.index');
                Route::get('/kategori_project/tambah',  'create')->name('kategori_project.create');
                Route::post('/kategori_project/store',  'store')->name('kategori_project.store');
                Route::delete('/kategori_project/{project}',  'destroy')->name('kategori_project.destroy');
            }
        );
    }

);
