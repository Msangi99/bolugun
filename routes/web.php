<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\SiteAboutItemController;
use App\Http\Controllers\Admin\SiteContactItemController;
use App\Http\Controllers\Admin\SitePageController;
use App\Http\Controllers\Admin\SiteProductCategoryController;
use App\Http\Controllers\Admin\SiteProductController;
use App\Http\Controllers\Admin\SiteServiceController;
use App\Http\Controllers\Admin\SiteTeamMemberController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::post('/contact', [ContactMessageController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('contact.store');

Route::get('/{slug}', [PageController::class, 'show'])
    ->whereIn('slug', ['about', 'services', 'products', 'contact'])
    ->name('pages.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [AdminAuthController::class, 'create'])->name('login');
        Route::post('login', [AdminAuthController::class, 'store'])->name('login.store');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('dashboard', AdminDashboardController::class)->name('dashboard');
        Route::post('logout', [AdminAuthController::class, 'destroy'])->name('logout');

        Route::get('site-pages', [SitePageController::class, 'index'])->name('site-pages.index');
        Route::get('site-pages/{sitePage}/edit', [SitePageController::class, 'edit'])->name('site-pages.edit');
        Route::put('site-pages/{sitePage}', [SitePageController::class, 'update'])->name('site-pages.update');

        Route::resource('services', SiteServiceController::class)->except(['show']);
        Route::resource('about-items', SiteAboutItemController::class)->except(['show']);
        Route::resource('team-members', SiteTeamMemberController::class)->except(['show']);
        Route::resource('contact-items', SiteContactItemController::class)->except(['show']);

        Route::get('contact-messages', [AdminContactMessageController::class, 'index'])->name('contact-messages.index');
        Route::get('contact-messages/{contact_message}', [AdminContactMessageController::class, 'show'])->name('contact-messages.show');
        Route::delete('contact-messages/{contact_message}', [AdminContactMessageController::class, 'destroy'])->name('contact-messages.destroy');

        Route::resource('product-categories', SiteProductCategoryController::class)->except(['show']);
        Route::resource('products', SiteProductController::class)->except(['show']);
    });
});
