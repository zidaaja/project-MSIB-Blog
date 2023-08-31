<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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


Route::prefix('admin')->middleware(['role:admin'])->name('admin.')->group(function() {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('article', AdminArticleController::class);
    Route::post('article-category', [AdminArticleController::class, 'category'])->name('article.category');


    Route::get('setting/{user}', [AdminDashboardController::class, 'setting'])->name('setting');


});

Route::get('ckeditor', function () {
    return view('admin.article.ckeditor');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog-detail', function () {
    return view('blog-detail');
});

require __DIR__.'/auth.php';
