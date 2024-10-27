<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StockReportController;


Route::get('/stock-report', [StockReportController::class, 'index'])->name('dashboard-stock-report');
