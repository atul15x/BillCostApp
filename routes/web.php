<?php

use App\Http\Controllers\BillCostApp;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BillCostApp::class, 'index']);

Route::post('/regUser', [BillCostApp::class, 'regUser']);

Route::post('/loginUser', [BillCostApp::class, 'loginUser']);

Route::get('/home', [BillCostApp::class, 'home']);

Route::post('/addCost', [BillCostApp::class, 'addCost']);

Route::delete('/deleteCost{id}', [BillCostApp::class, 'deleteCost']);

Route::post('/logout', [BillCostApp::class, 'logout']);

Route::get('/search', [BillCostApp::class, 'search'])->name('search');

Route::post('/searchCost', [BillCostApp::class, 'searchCost'])->name('searchCost');