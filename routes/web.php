<?php

use App\Livewire\CategoryManagment;
use App\Livewire\Statistic;
use App\Livewire\Transaction\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){return view('dashboard');})->name('home');
Route::get('category_management', CategoryManagment::class)->name('category_management');
Route::get('statistics', function(){return view('statistic');})->name('statistics');
