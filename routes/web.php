<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\AuthMiddleware;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', [UserController::class, 'registerForm']);
Route::post('/register/save', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginForm']);
Route::post('/login/save', [UserController::class, 'login']);

Route::get('/logout',  function(){
    return view('auth/logout');
});
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/home', function(){
    return view('user/home');
});

// Route::prefix('cat')->controller(CategoryController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::get('/add', 'add');
//    Route::get('/edit/{id}', 'update');
//     Route::post('/save', 'save');
// //    ->middleware(AuthorMiddleware::class);
//    Route::get('/delete/{id}', 'delete');
//    Route::post('/delete/{id}', 'delete');
// });

// Route::prefix('event')->controller(EventController::class)->group(function () {
//     Route::get('/', 'index');
//     Route::get('/add', 'add');
//    Route::get('/edit/{id}', 'update');
//     Route::post('/save', 'save');
//    Route::get('/delete/{id}', 'delete');
//    Route::post('/delete/{id}', 'delete');
// });

// Route::prefix('ticket')->controller(TicketController::class)->group(function () {
//     Route::get('event/{event_id}', 'index');
//     Route::get('event/{event_id}/create', 'ticket');
//     Route::post('/{event_id}/save', 'save');
//     Route::get('/event/{event_id}/edit/{ticket_id}', 'update');
//     Route::get('/delete/{id}', 'delete');
//     Route::post('/delete/{id}', 'delete');
// });


Route::middleware(AuthMiddleware::class)->group(function () {

    Route::get('/dashboard', function(){
        return view('admin/dashboard');
    });

    Route::prefix('cat')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::get('/edit/{id}', 'update');
        Route::post('/save', 'save');
        Route::get('/delete/{id}', 'delete');
        Route::post('/delete/{id}', 'delete');
    });

    Route::prefix('event')->controller(EventController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::get('/edit/{id}', 'update');
        Route::post('/save', 'save');
        Route::get('/delete/{id}', 'delete');
        Route::post('/delete/{id}', 'delete');
    });

    Route::prefix('ticket')->controller(TicketController::class)->group(function () {
        Route::get('event/{event_id}', 'index');
        Route::get('event/{event_id}/create', 'ticket');
        Route::post('/{event_id}/save', 'save');
        Route::get('/event/{event_id}/edit/{ticket_id}', 'update');
        Route::get('/event/{event_id}/delete/{ticket_id}', 'delete');
        Route::post('/event/{event_id}/delete/{ticket_id}', 'delete');
    });
});
