<?php

use App\Livewire\Transaction\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){return view('dashboard');})->name('home');
