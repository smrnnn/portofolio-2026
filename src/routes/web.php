<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

Route::get('/', function () {

    $projects = \App\Models\FinalProject::all();

    $profile = \App\Models\Profile::first();

    return view('home', compact(
        'projects',
        'profile'
    ));
});

Route::post('/contact', [ContactController::class, 'store']);