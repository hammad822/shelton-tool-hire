<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'moderator', 'prefix' => 'moderator', 'as' => 'moderator.'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [\App\Http\Controllers\Moderator\DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/pending-tools', [\App\Http\Controllers\Moderator\DashboardController::class, 'pendingtool'])->name('pending.tools');
        Route::get('/pending-services', [\App\Http\Controllers\Moderator\DashboardController::class, 'pendingServices'])->name('pending.services');
        Route::get('approve/tool/{id}', [\App\Http\Controllers\Moderator\DashboardController::class, 'approveTool'])->name('approve.tool');
        Route::get('reject/tool/{id}', [\App\Http\Controllers\Moderator\DashboardController::class, 'rejectTool'])->name('reject.tool');
        Route::get('approve/service/{id}', [\App\Http\Controllers\Moderator\DashboardController::class, 'approveService'])->name('approve.service');
        Route::get('reject/service/{id}', [\App\Http\Controllers\Moderator\DashboardController::class, 'rejectService'])->name('reject.service');
        Route::get('toggle/tool/status/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'toggleToolStatus'])->name('toggle.tool');
        Route::resource('tool', \App\Http\Controllers\Moderator\ToolController::class);
        Route::resource('tool-services', \App\Http\Controllers\Moderator\ToolServicesController::class);
    });
});
Route::group(['middleware' => ['owner', 'auth'], 'prefix' => 'owner', 'as' => 'owner.'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\Owner\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/search-tool', [\App\Http\Controllers\Owner\DashboardController::class, 'searchTool'])->name('search.tool');

    Route::get('toggle/tool/status/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'toggleToolStatus'])->name('toggle.tool');
    Route::post('tool', [\App\Http\Controllers\Owner\DashboardController::class, 'storeTool'])->name('store.tool');
    Route::get('edit/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'editTool'])->name('edit.tool');
    Route::get('edit/tool/price/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'editToolPrice'])->name('edit.tool.price');
    Route::post('update/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'updateTool'])->name('update.tool');
    Route::post('update/price/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'updateToolPrice'])->name('update.tool.price');
    Route::post('tool-services', [\App\Http\Controllers\Owner\DashboardController::class, 'storeServices'])->name('store.services');
    Route::post('tool-pricing', [\App\Http\Controllers\Owner\DashboardController::class, 'storePricing'])->name('store.pricing');
    Route::get('tool-detail/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'ToolDetail'])->name('get.tool.detail');
    Route::get('tool-prices/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'ToolPrices'])->name('get.tool.prices');
    Route::post('review', [\App\Http\Controllers\Owner\DashboardController::class,'review'])->name('review.store');
    Route::post('comment', [\App\Http\Controllers\Owner\DashboardController::class,'comment'])->name('comment.store');
    Route::post('comment-reply', [\App\Http\Controllers\Owner\DashboardController::class, 'submitReply'])->name('submit.reply');
    Route::post('like-tool/{id}', [\App\Http\Controllers\Owner\DashboardController::class, 'likeTool'])->name('like.tool');

});

Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/search-tool', [\App\Http\Controllers\User\DashboardController::class, 'searchTool'])->name('search.tool');
    Route::group(['middleware' => 'auth'], function () {
        Route::resource('tool', \App\Http\Controllers\User\ToolController::class);
        Route::post('hire-tool', [\App\Http\Controllers\User\ToolController::class,'hireTool'])->name('hire.tool');
        Route::get('hire/new/tool/{id}', [\App\Http\Controllers\User\ToolController::class,'hireNewTool'])->name('hire.new.tool');
        Route::get('hired-tools', [\App\Http\Controllers\User\ToolController::class,'hiredTools'])->name('hired.tools');
        Route::resource('review', \App\Http\Controllers\User\ReviewController::class);
        Route::resource('comment', \App\Http\Controllers\User\CommentController::class);
        Route::post('comment-reply', [\App\Http\Controllers\User\CommentController::class, 'submitReply'])->name('submit.reply');
        Route::post('like-tool/{id}', [\App\Http\Controllers\User\CommentController::class, 'likeTool'])->name('like.tool');
    });
});
