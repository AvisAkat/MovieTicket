<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowingController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

// Route::get('/test', function () {
//     $tickets = App\Models\Ticket::orderBy('purchased_at','desc')->limit(4)->get();
//     Illuminate\Support\Facades\Mail::to('test@test.com')->send(new App\Mail\TicketSold('Kwaku Mensah',$tickets));
//     return new App\Mail\TicketSold('Test User',$tickets);
// });

Route::get('/', [ShowingController::class,'index'])->name('home');


Route::prefix('/admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::resource('/showings', ShowingController::class);
    Route::get('/show', [ShowingController::class, 'showingList'])->name('showings.list');
    Route::get('/ShowingView/{showing}', [ShowingController::class, 'view'])->name('showings.view');
    Route::resource('/movies', MovieController::class);
    //Route::get('login', [authController::class, 'getLoginForm']);
    Route::post('logout', [authController::class, 'logoutUser']);
    Route::resource('/users', UserController::class);
    Route::resource('/tickets', TicketController::class);

});










Route::post('showings/{showing}/buy', [ShowingController::class, 'buyTicket'])->name('ticket.buy');


Route::get('login', [authController::class, 'getLoginForm'])->name('auth.login');

Route::get('signup', [authController::class, 'getSignupForm'])->name('auth.signup');

Route::post('register', [authController::class, 'register'])->name('auth.register');

Route::post('login', [authController::class, 'loginUser'])->name('auth.loginUser');

Route::post('logout', [authController::class, 'logoutUser'])->name('auth.logout');

Route::get('ticket-verify/{id}', [TicketController::class,'verify'])->name('verify.ticket');

//Route::post('signup', [authController::class, 'signupStore'])->name('auth.store');


