<?php

use App\Livewire\ProductIndex;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // index/root page (/) is welcome page
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified']) // check if user is authenticated and email is verified
    ->name('dashboard');

Route::middleware(['auth'])->group(function () { 
    // middleware for authenticated users
    // group all routes that require authentication
    Route::redirect('settings', 'settings/profile');

    Route::get('product', ProductIndex::class)->name('product');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');

    // Route::get('products', \App\Livewire\ProductIndex::class)->name('products.index');
    // Route::get('products/create', \App\Livewire\ProductCreate::class)->name('products.create');
    // Route::get('products/{product}/edit', \App\Livewire\ProductEdit::class)->name('products.edit');
    // Route::get('products/{product}', \App\Livewire\ProductShow::class)->name('products.show');
    // Route::get('products/{product}/delete', \App\Livewire\ProductDelete::class)->name('products.delete');
    // Route::get('products/{product}/restore', \App\Livewire\ProductRestore::class)->name('products.restore');
    // Route::get('products/{product}/force-delete', \App\Livewire\ProductForceDelete::class)->name('products.force-delete'); 
});

require __DIR__.'/auth.php';
