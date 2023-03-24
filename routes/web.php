<?php

use App\Http\Livewire\GoogleSearch;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('search');
});
