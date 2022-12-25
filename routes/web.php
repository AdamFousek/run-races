<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire;


Route::get('/', Livewire\Pages\Welcome::class)->name('news');

Route::get('/article/{post}')->name('article');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['adminRoutes'])->prefix('/admin')->group(function () {
        Route::get('/', Livewire\Admin\Dashboard::class)->name('dashboard');
        Route::get('/post/create', Livewire\Admin\Posts\CreatePost::class)->name('admin.post.create');

        Route::get('/users', Livewire\Admin\Users\ShowUsers::class)->name('admin.users.index');
    });
});

require __DIR__.'/auth.php';
