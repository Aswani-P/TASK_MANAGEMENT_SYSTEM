<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/home',[HomeController::class,'index'])->middleware('auth')->name('home');


//task side route
Route::get('task',[TaskController::class,'dash'])->name('task');
Route::get('create',[TaskController::class,'create'])->name("create");
Route::post('save',[TaskController::class,'store'])->name('save');
Route::get('edit/{id}',[TaskController::class,'edit'])->name('edit');
Route::post('update',[TaskController::class,'update'])->name('update');
Route::get('delete/{id}',[TaskController::class,'delete'])->name('delete');



//admin side route
Route::get('admin_index',[AdminController::class,'read'])->name('admin_home');
Route::get('admin_add',[AdminController::class,'admin_add'])->name('admin_add');
Route::post('admin-save',[AdminController::class,'store'])->name('admin_save');
Route::post('admin-update',[AdminController::class,'update'])->name('admin_update');






// Route::get('/home', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
