<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SpecController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'auth'], function () {


    Route::post('/project', [ProjectController::class, 'create']);
    Route::get('/project', [ProjectController::class, 'index']);
    Route::put('/project/{id}', [ProjectController::class, 'edit']);
    Route::get('/project/{id}', [ProjectController::class, 'read']);

    Route::get('/blog', [BlogController::class, 'index']);
    Route::post('/blog', [BlogController::class, 'create']);
    Route::get('/blog/{id}', [BlogController::class, 'read']);
    Route::put('/blog/{id}', [BlogController::class, 'edit']);
    Route::delete('/blog/{id}', [BlogController::class, 'wipe']);

    // 
    Route::get('/posts/{id}', [PostController::class, 'index']);
    Route::post('/post', [PostController::class, 'create']);
    Route::get('/post/{id}', [PostController::class, 'read']);
    Route::put('/post/{id}', [PostController::class, 'edit']);
    Route::get('/{blog}/new', [PostController::class, 'new']);
    Route::delete('/post/{id}', [PostController::class, 'wipe']);
    Route::get('/view/{id}', [PostController::class, 'view']);
    // 
    // Route::get('/block/{id}', [BlockController::class, 'index']);
    // Route::get('/block/{id}', [BlockController::class, 'show']);
    // Route::get('/blocks/{id}', [BlockController::class, 'all']);
    Route::post('/block', [BlockController::class, 'create']);
    Route::put('/block/{id}', [BlockController::class, 'edit']);
    Route::delete('/block/{id}', [BlockController::class, 'wipe']);
    // Route::put('/block/{id}', [BlockController::class, 'update']);
    // Route::delete('/block/{id}', [BlockController::class, 'destroy']);

    // 
    Route::get('/brand/{id}', [BrandController::class, 'read']);
    Route::get('/brands', [BrandController::class, 'index']);
    Route::post('/brand', [BrandController::class, 'create']);
    Route::post('/wire/{id}', [BrandController::class, 'wire']);
    Route::put('/brand/{id}', [BrandController::class, 'edit']);
    Route::delete('/brand/{id}', [BrandController::class, 'wipe']);
    // 

    Route::get('/group/{id}', [GroupController::class, 'read']);
    Route::get('/groups', [GroupController::class, 'index']);
    Route::post('/group', [GroupController::class, 'create']);
    Route::put('/group/{id}', [GroupController::class, 'edit']);
    Route::delete('/group/{id}', [GroupController::class, 'wipe']);

    // 

    Route::get('/category', [CategoryController::class, 'cats']);
    Route::post('/category', [CategoryController::class, 'create']);
    Route::delete('/category/{id}', [CategoryController::class, 'wipe']);
    Route::put('/category/{id}', [CategoryController::class, 'edit']);


    // 
    Route::get('/specs/{id}', [SpecController::class, 'index']);
    Route::post('/specs', [SpecController::class, 'create']);
    Route::put('/specs/{id}', [SpecController::class, 'edit']);
    Route::delete('/specs/{id}', [SpecController::class, 'wipe']);




    Route::get('/details/{id}', [DetailController::class, 'all']);
    Route::post('/detail', [DetailController::class, 'create']);
    Route::put('/detail/{id}', [DetailController::class, 'edit']);
    Route::post('/connect/{id}', [DetailController::class, 'connect']);
    //



});
