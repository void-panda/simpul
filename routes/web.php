<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::resource('news', NewsController::class)->only(['index', 'show']);
Route::resource('events', EventsController::class)->only(['index', 'show']);

route::get('about', AboutController::class)->name('about');

route::get('contact', [ContactController::class, 'index'])->name('contact.index');
route::post('contact/send-email', [ContactController::class, 'send'])->name('contact.send');

route::get('donation', [DonationController::class, 'index'])->name('donation.index');
route::post('donation', [DonationController::class, 'store'])->name('donation.store');
