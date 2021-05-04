<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\SellersController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\WishlistsController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/la/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->route('services.index');
})->name('language');
Auth::routes();

// for the search using ajax
Route::get("/search", [ServicesController::class, 'search'])->name('search');
Route::get('autocomplete', [ServicesController::class, 'autocomplete'])->name('autocomplete');
Route::get('/categories/{category}', CategoriesController::class)->name('search.category');
Route::get('/', [ServicesController::class, 'index'])->name('services.index');
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('auth/twitter', [TwitterController::class, 'redirectToTwitter']);
Route::get('auth/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);

Route::middleware('auth')->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('sellers', SellersController::class)->except(['show']);
    Route::get('/sellers/{seller}', [SellersController::class, 'show'])->name('sellers.show')->withoutMiddleware('auth');
    Route::resource('services', ServicesController::class)->except(['index', 'show']);
    Route::get('/services/{service}', [ServicesController::class, 'show'])->name('services.show')->withoutMiddleware('auth');

    Route::get('/services/{service}/download', [ServicesController::class, 'getDownload'])->name('services.download');
    Route::get('/profile/{user}', [UsersController::class, 'edit'])->name('profiles.edit')->middleware('verified');
    Route::patch('/{user}', [UsersController::class, 'update'])->name('profiles.update');
    Route::post('/follow/{seller}', [UsersController::class, 'follow'])->name('follows.add');
    Route::prefix('wishlists')->group(function () {
        Route::get('/', [WishlistsController::class, 'show'])->name('wishlists.show');
        Route::post('/{service}', [WishlistsController::class, 'add'])->name('wishlists.add');
    });

    Route::prefix('orders')->group(function () {
        Route::post('/{service}', [OrdersController::class, 'changeQuantity'])->name('orders.qty');
        Route::get('/{user}', [OrdersController::class, 'index'])->name('orders.index');
        Route::get('/{service}/order', [OrdersController::class, 'show'])->name('orders.show');
        Route::post('/{service}/pay', [OrdersController::class, 'pay'])->name('orders.pay');
        // ->middleware(['password.confirm'])
        Route::post('/', [OrdersController::class, 'store'])->name('orders.store');
        Route::delete('/{order}', [OrdersController::class, 'destroy'])->name('orders.destroy');
    });
    Route::post('/rating', [RatingsController::class, 'store'])->name('ratings.store');
    Route::prefix('messages')->group(function () {
        Route::get('/', [MessagesController::class, 'index'])->name('messages');
        Route::get('create', [MessagesController::class, 'create'])->name('messages.create');
        Route::post('/', [MessagesController::class, 'store'])->name('messages.store');
        Route::get('{id}', [MessagesController::class, 'show'])->name('messages.show');
        Route::put('{id}', [MessagesController::class, 'update'])->name('messages.update');
    });
});
// Verify Email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');;
