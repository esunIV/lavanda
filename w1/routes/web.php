<?php
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'welcome';
});



Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/create', [HomeController::class, 'create'])->name('home.create');
Route::post('/home', [HomeController::class, 'store'])->name('home.store');
Route::get('/home/{post}', [HomeController::class, 'show'])->name('home.show');
Route::get('/home/{post}/edit', [HomeController::class, 'edit'])->name('home.edit');
Route::patch('/home/{post}', [HomeController::class, 'update'])->name('home.update');
Route::delete('/home/{post}', [HomeController::class, 'destroy'])->name('home.delete');