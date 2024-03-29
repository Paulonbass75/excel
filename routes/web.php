<?php

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportsController;
// use App\Http\Controllers\ImportsController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('users/export/', function() {
//     return Excel::download(new UsersExport, 'users.xlsx');
// })->name('users.export');

Route::get('export/', [ExportsController::class, 'export'])->name('export');

Route::get('/users/import', 'App\Http\Controllers\ImportsController@show');
Route::post('users/import/', 'App\Http\Controllers\ImportsController@store');
