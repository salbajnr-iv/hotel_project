<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/room', '/rooms');
Route::get('/rooms', [\App\Http\Controllers\HomeController::class, 'rooms'])->name('rooms.index');
Route::get('/book/{room_id?}', [\App\Http\Controllers\BookingController::class, 'create'])->name('booking.create');
Route::post('/book', [\App\Http\Controllers\BookingController::class, 'store'])->name('book.store');
Route::post('/newsletter', [\App\Http\Controllers\HomeController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

Route::get('/about', function () {
    return view('home.about');
})->name('about');

Route::get('/gallery', [\App\Http\Controllers\HomeController::class, 'gallery'])->name('gallery');

Route::get('/blog', [\App\Http\Controllers\HomeController::class, 'blog'])->name('blog');

Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\HomeController::class, 'storeContact'])->name('contact.store');



// Jetstream/Fortify registers the auth routes (including the named `login` route).
// Removing the custom `/login` closure prevents `Route [login] not defined` errors.


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin hotel management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        Route::resource('rooms', \App\Http\Controllers\Admin\RoomController::class);
        Route::resource('gallery', \App\Http\Controllers\Admin\GalleryItemController::class);
        Route::resource('blog', \App\Http\Controllers\Admin\BlogPostController::class);

        Route::get('/bookings', [\App\Http\Controllers\Admin\BookingController::class, 'index'])->name('bookings.index');
        Route::post('/bookings/{booking}/status', [\App\Http\Controllers\Admin\BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
        Route::delete('/bookings/{booking}', [\App\Http\Controllers\Admin\BookingController::class, 'destroy'])->name('bookings.destroy');

        Route::get('/contact-messages', [\App\Http\Controllers\Admin\ContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::post('/contact-messages/{contact}/status', [\App\Http\Controllers\Admin\ContactMessageController::class, 'updateStatus'])->name('contact-messages.updateStatus');
        Route::delete('/contact-messages/{contact}', [\App\Http\Controllers\Admin\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
    });
});

