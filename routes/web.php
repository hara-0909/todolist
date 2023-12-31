<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
    // return view('welcome');
// });

// Auth::routes();

// Route::get('/', [HomeController::class,'index'])->name('home');


// Route::get('/dashboard', function () {
    // return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class,'index'])->name('home');

    Route::group(['middleware' => 'auth'], function() {
        

// タスク一覧ページ
Route::get('/folders/{id}/tasks', [TaskController::class,'index'])->name('tasks.index');

// フォルダ一覧
Route::get('/folders/create', [FolderController::class,'showCreateForm'])->name('folders.create');
// フォルダ作成
Route::post('/folders/create', [FolderController::class,'create']);

// タスク一覧
Route::get('/folders/{id}/tasks/create', [TaskController::class,'showCreateForm'])->name('tasks.create');
// タスク作成
Route::post('/folders/{id}/tasks/create', [TaskController::class,'create']);

// タスク編集ページ
Route::get('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,'showEditForm'])->name('tasks.edit');
// タスク編集
Route::post('/folders/{id}/tasks/{task_id}/edit', [TaskController::class,'edit']);
});

require __DIR__.'/auth.php';

