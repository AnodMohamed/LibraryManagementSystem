<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BorrowsController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AudiobookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentBookController;
use App\Http\Controllers\AdminDashboardController;
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

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/AppointmentPage{borrow:id}', [HomeController::class, 'AppointmentPage'])->name('AppointmentPage');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('{post:slug}', [PostController::class, 'show'])->name('post.show');


Route::group(['middleware' => ['authadmin'], 'prefix' => 'AdminDashboard'], function () {

    // Dashboard
    Route::group(['prefix' => '', 'as' => 'AdminDashboard.'], function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    });

    // Categories
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('{category:slug}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('{category:slug}', [CategoryController::class, 'update'])->name('update');
        Route::delete('{category:slug}/delete', [CategoryController::class, 'destroy'])->name('delete');
    });

    // Tags
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('create', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('{tag:slug}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('{tag:slug}', [TagController::class, 'update'])->name('update');
        Route::delete('{tag:slug}/delete', [TagController::class, 'destroy'])->name('delete');
    });
    // Students
    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::get('/', [StudentsController::class, 'index'])->name('index');
        Route::get('create', [StudentsController::class, 'create'])->name('create');
        Route::post('/', [StudentsController::class, 'store'])->name('store');

    });

    // Books
    Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
        Route::get('/display', [AdminBookController::class, 'index'])->name('display');
        Route::get('/create', [AdminBookController::class, 'create'])->name('create');
        Route::post('/', [AdminBookController::class, 'store'])->name('store');
        Route::get('{book:slug}/edit', [AdminBookController::class, 'edit'])->name('edit');
        Route::put('{book:slug}', [AdminBookController::class, 'update'])->name('update');
        Route::delete('{book:slug}/delete', [AdminBookController::class, 'destroy'])->name('delete');

    });

     // Borrows
     Route::group(['prefix' => 'borrows', 'as' => 'borrows.'], function () {
        Route::get('/pending', [BorrowsController::class, 'pending'])->name('pending');
        Route::get('/acceptable', [BorrowsController::class, 'acceptable'])->name('acceptable');
        Route::get('/driven', [BorrowsController::class, 'driven'])->name('driven');
        Route::get('/receive', [BorrowsController::class, 'receive'])->name('receive');

    });

    //audiobooks
    Route::group(['prefix' => 'audiobooks', 'as' => 'audiobooks.'], function () {
        Route::get('/admin-index', [AudiobookController::class, 'adminIndex'])->name('adminIndex');
    });
});

Route::group(['middleware' => ['authStudent'], 'prefix' => 'StudentDashboard'], function () {

    // Dashboard
    Route::group(['prefix' => '', 'as' => 'StudentDashboard.'], function () {
        Route::get('/', [StudentDashboardController::class, 'index'])->name('index');

    });


    // Posts
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/', [PostController::class, 'index'])->name('index');
        Route::get('create', [PostController::class, 'create'])->name('create');
        Route::post('/', [PostController::class, 'store'])->name('store');
        Route::get('{post:slug}/edit', [PostController::class, 'edit'])->name('edit');
        Route::put('{post:slug}', [PostController::class, 'update'])->name('update');
        Route::get('{post:slug}', [PostController::class, 'show'])->name('show');
    });


    // Books
    Route::group(['prefix' => 'books', 'as' => 'books.'], function () {
        Route::get('/', [StudentBookController::class, 'index'])->name('index');

    });

    // Borrows
    Route::group(['prefix' => 'borrows', 'as' => 'borrows.'], function () {
        Route::get('/studentIndex', [BorrowsController::class, 'studentIndex'])->name('studentIndex');

    });

    //Payments
    Route::group(['prefix' => 'payments', 'as' => 'payments.'], function () {
        Route::get('/fine', [paymentController::class, 'fine'])->name('fine');
        Route::get('/paid', [paymentController::class, 'paid'])->name('paid');
        Route::get('/{unpaid:id}/payment', [paymentController::class, 'payment'])->name('payment');
        Route::post('/stripePost', [paymentController::class, 'stripePost'])->name('stripePost');

    });

    //audiobooks

    Route::group(['prefix' => 'audiobooks', 'as' => 'audiobooks.'], function () {
        Route::get('/index', [AudiobookController::class, 'index'])->name('index');
        Route::get('/create', [AudiobookController::class, 'create'])->name('create');
        Route::post('/', [AudiobookController::class, 'store'])->name('store');

    });

    //comment
     Route::post('{post:id}/comment', [PostController::class, 'storeComment'])->name('post.comment');


});

