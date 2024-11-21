<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ConfigBannersController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MembershipFeeController;
use App\Http\Controllers\MembershipFeeDetailsController;
use App\Http\Controllers\PhotoLibraryController;
use App\Http\Controllers\PostController;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/Categories/data', [CategoriesController::class, 'getData']);
Route::post('/Categories/create', [CategoriesController::class, 'store']);
Route::delete('/Categories/delete{id}', [CategoriesController::class, 'destroy']);
Route::put('/Categories/update', [CategoriesController::class, 'update']);

Route::get('/ConfigBanners/data', [ConfigBannersController::class, 'getData']);
Route::post('/ConfigBanners/create', [ConfigBannersController::class, 'store']);
Route::delete('/ConfigBanners/delete{id}', [ConfigBannersController::class, 'destroy']);
Route::put('/ConfigBanners/update', [ConfigBannersController::class, 'update']);

Route::get('/Document/data', [DocumentController::class, 'getData']);
Route::post('/Document/create', [DocumentController::class, 'store']);
Route::delete('/Document/delete{id}', [DocumentController::class, 'destroy']);
Route::put('/Document/update', [DocumentController::class, 'update']);

Route::get('/Events/data', [EventsController::class, 'getData']);
Route::post('/Events/create', [EventsController::class, 'store']);
Route::delete('/Events/delete{id}', [EventsController::class, 'destroy']);
Route::put('/Events/update', [EventsController::class, 'update']);

Route::get('/PhotoLibrary/data', [PhotoLibraryController::class, 'getData']);
Route::post('/PhotoLibrary/create', [PhotoLibraryController::class, 'store']);
Route::delete('/PhotoLibrary/delete{id}', [PhotoLibraryController::class, 'destroy']);
Route::put('/PhotoLibrary/update', [PhotoLibraryController::class, 'update']);

Route::get('/Post/data', [PostController::class, 'getData']);
Route::post('/Post/create', [PostController::class, 'store']);
Route::delete('/Post/delete{id}', [PostController::class, 'destroy']);
Route::put('/Post/update', [PostController::class, 'update']);

Route::get('/Member/data', [MemberController::class, 'getData']);
Route::post('/Member/create', [MemberController::class, 'store']);
Route::delete('/Member/delete{id}', [MemberController::class, 'destroy']);
Route::put('/Member/update', [MemberController::class, 'update']);

Route::get('/MembershipFee/data', [MembershipFeeController::class, 'getData']);
Route::post('/MembershipFee/create', [MembershipFeeController::class, 'store']);
Route::delete('/MembershipFee/delete{id}', [MembershipFeeController::class, 'destroy']);
Route::put('/MembershipFee/update', [MembershipFeeController::class, 'update']);


Route::get('/MembershipFeeDetails/data', [MembershipFeeDetailsController::class, 'getData']);
Route::post('/MembershipFeeDetails/create', [MembershipFeeDetailsController::class, 'store']);
Route::delete('/MembershipFeeDetails/delete{id}', [MembershipFeeDetailsController::class, 'destroy']);
Route::put('/MembershipFeeDetails/update', [MembershipFeeDetailsController::class, 'update']);

Route::get('/Contact/data', [ContactController::class, 'getData']);
Route::post('/Contact/create', [ContactController::class, 'store']);
Route::delete('/Contact/delete{id}', [ContactController::class, 'destroy']);
Route::put('/Contact/update', [ContactController::class, 'update']);