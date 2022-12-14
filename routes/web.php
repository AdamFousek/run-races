<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire;


Route::get('/', Livewire\Pages\Welcome::class)->name('article.index');

Route::get('/article/{post}', Livewire\Pages\PostDetail::class)->name('article.detail');
// Route::get('/races', )
Route::get('/race/{race}', Livewire\Pages\RaceDetail::class)->name('race.detail');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['adminRoutes'])->prefix('/admin')->group(function () {
        Route::get('/', Livewire\Admin\Dashboard::class)->name('dashboard');

        Route::prefix('/post')->group(function () {
            Route::get('/create', Livewire\Admin\Posts\CreatePost::class)->name('admin.post.create');
            Route::get('/{post:id}/edit', Livewire\Admin\Posts\UpdatePost::class)->name('admin.post.update');
            Route::get('/{post:id}/comments', Livewire\Admin\Comments\ShowComments::class)->name('admin.post.comments');
        });

        Route::prefix('/races')->group(function () {
            Route::get('/', Livewire\Admin\Races\ShowRaces::class)->name('admin.races.index');
            Route::get('/create', Livewire\Admin\Races\CreateRace::class)->name('admin.races.create');
        });

        Route::get('/users', Livewire\Admin\Users\ShowUsers::class)->name('admin.users.index');
    });
});

require __DIR__.'/auth.php';
