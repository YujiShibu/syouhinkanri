<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::resource('employees', EmployeeController::class);


use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WorkTimeController;
use App\Http\Controllers\AttendanceController;


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

Route::get('/item', [App\Http\Controllers\ItemController::class, 'create']);
Route::post('/item', [App\Http\Controllers\ItemController::class, 'store']);

// 商品関連
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

// レビュー関連
Route::get('/items/{item}/reviews', [ReviewController::class, 'index'])->name('items.reviews.index');
Route::post('/items/{item}/reviews', [ReviewController::class, 'store'])->name('items.reviews.store');
Route::get('/reviews/{review}', [ReviewController::class, 'show'])->name('reviews.show');

//　出退勤関連
Route::get('/work-times', [WorkTimeController::class, 'index']);
Route::get('/work-times', [WorkTimeController::class, 'index'])->name('work.index');
Route::post('/work-times/start', [WorkTimeController::class, 'start'])->name('work.start');
Route::post('/work-times/end', [WorkTimeController::class, 'end'])->name('work.end');
Route::post('/work-times/rest-on', [WorkTimeController::class, 'restOn'])->name('work.rest_on');
Route::post('/work-times/rest-back', [WorkTimeController::class, 'restBack'])->name('work.rest_back');
// 出退勤登録関連
Route::get('/attendances/create', [AttendanceController::class, 'create'])->name('attendances.create');
Route::post('/attendances/clock-in', [AttendanceController::class, 'clockIn'])->name('attendances.clockIn');
Route::post('/attendances/break-start', [AttendanceController::class, 'breakStart'])->name('attendances.breakStart');
Route::post('/attendances/break-end', [AttendanceController::class, 'breakEnd'])->name('attendances.breakEnd');
Route::post('/attendances/clock-out', [AttendanceController::class, 'clockOut'])->name('attendances.clockOut');

// 出退勤編集関連
Route::get('/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('attendances.update');


// 出退勤一覧関連
Route::get('/attendances', [AttendanceController::class, 'index'])->name('attendances.index');

// ルートの一覧を表示するページ（開発が終わったら消します）
use App\Http\Controllers\RouteListController;

Route::get('/route-list', [RouteListController::class, 'index'])->name('route.list');
