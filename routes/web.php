<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\CKEditorController as AdminCKEditorController;



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

// Route::get('/', function () {
//     return view('welcome');
// });

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
    Route::post('article-publish/{article}', [AdminArticleController::class, 'publish'])->name('article.publish');
    Route::get('article-category', [AdminArticleController::class, 'category'])->name('article.category');
    Route::post('article-category_store', [AdminArticleController::class, 'category_store'])->name('article.category_store');
    Route::put('article-category_update/{category}', [AdminArticleController::class, 'category_update'])->name('article.category_update');
    Route::delete('article-category_destroy/{category}', [AdminArticleController::class, 'category_destroy'])->name('article.category_destroy');


    // Route::put('article-category', [AdminArticleController::class, 'category'])->name('article.category');



    Route::get('setting/{user}', [AdminDashboardController::class, 'setting'])->name('setting');

    Route::post('/ckeditor/upload', [AdminCKEditorController::class, 'upload'])->name('ckeditor.upload');


});

Route::get('ckeditor', function () {
    return view('admin.article.ckeditor');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);


Route::get('/blog', [BlogController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog-detail', function () {
    return view('blog-detail');
});

require __DIR__.'/auth.php';
