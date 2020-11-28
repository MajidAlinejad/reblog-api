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
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




// project route
Route::get('/app', [ProjectController::class, 'index']);

//search route
Route::get('/search/{id}', [SearchController::class, 'search']);
// blog route
Route::get('/blog/{url}', [BlogController::class, 'show']);
Route::get('/blogs', [BlogController::class, 'all']);
Route::post('/blog', [BlogController::class, 'store']);
Route::put('/blog/{id}', [BlogController::class, 'update']);
Route::delete('/blog/{id}', [BlogController::class, 'destroy']);

// group route
Route::get('/group/{id}', [GroupController::class, 'show']);
Route::get('/groups', [GroupController::class, 'all']);
Route::post('/group', [GroupController::class, 'store']);
Route::put('/group/{id}', [GroupController::class, 'update']);
Route::delete('/group/{id}', [GroupController::class, 'destroy']);

// cat route
Route::get('/cat/{id}', [CategoryController::class, 'index']);
Route::get('/cats', [CategoryController::class, 'all']);
Route::get('/blogcat/{id}', [CategoryController::class, 'blog']);
Route::get('/cats/{id}', [CategoryController::class, 'show']);
Route::post('/cat', [CategoryController::class, 'store']);
Route::put('/cat/{id}', [CategoryController::class, 'update']);
Route::delete('/cat/{id}', [CategoryController::class, 'destroy']);

// brand route
Route::get('/brand/{id}', [BrandController::class, 'show']);
Route::get('/brands/{id}', [BrandController::class, 'post']);
Route::get('/brands', [BrandController::class, 'all']);
Route::get('/catbrands/{id}', [BrandController::class, 'cat']);
Route::post('/brand', [BrandController::class, 'store']);
Route::put('/brand/{id}', [BrandController::class, 'update']);
Route::delete('/brand/{id}', [BrandController::class, 'destroy']);

// tag route
Route::get('/tags', [TagController::class, 'all']);
Route::get('/tagsname/{id}', [TagController::class, 'tags']);


// block route
Route::get('/block/{id}', [BlockController::class, 'show']);
Route::get('/blocks/{id}', [BlockController::class, 'all']);
Route::post('/block', [BlockController::class, 'store']);
Route::put('/block/{id}', [BlockController::class, 'update']);
Route::delete('/block/{id}', [BlockController::class, 'destroy']);

// block route
// Route::get('/postspec/{id}', [SpecController::class, 'index']);
Route::get('/spec/{id}', [SpecController::class, 'show']);
Route::get('/speclists/{id}', [SpecController::class, 'details']);
Route::get('/specs/{id}', [SpecController::class, 'cat']);
Route::post('/spec', [SpecController::class, 'store']);
Route::put('/spec/{id}', [SpecController::class, 'update']);
Route::delete('/spec/{id}', [SpecController::class, 'destroy']);

// block route
Route::get('/postdetail/{id}', [DetailController::class, 'index']);
Route::get('/details/{id}', [DetailController::class, 'post']);
// Route::get('/detailspec/{id}', [DetailController::class, 'specs']);
Route::get('/detail/{id}/{cat}', [DetailController::class, 'spec']);
Route::post('/detail', [DetailController::class, 'store']);
Route::put('/detail/{id}', [DetailController::class, 'update']);
Route::delete('/detail/{id}', [DetailController::class, 'destroy']);

// post route
Route::get('/post/{id}', [PostController::class, 'show']);
Route::get('/base/{id}', [PostController::class, 'base']);
Route::get('/posts/{id}', [PostController::class, 'all']);
Route::post('/posts/{id}', [PostController::class, 'filter']);
Route::post('/post', [PostController::class, 'store']);
Route::put('/post/{id}', [PostController::class, 'update']);
Route::delete('/post/{id}', [PostController::class, 'destroy']);

// comment route
Route::get('/comment/{id}', [CommentController::class, 'show']);
Route::get('/comments/{id}', [CommentController::class, 'all']);
Route::post('/comment', [CommentController::class, 'store']);
Route::put('/comment/{id}', [CommentController::class, 'update']);
Route::delete('/comment/{id}', [CommentController::class, 'destroy']);

// like route
Route::get('/likes',  [LikeController::class, 'likes']);
Route::get('/likes/post/{id}',  [LikeController::class, 'post']);
Route::get('/unlikes/user/{id}',  [LikeController::class, 'userunlikes']);
Route::get('/unlikes/post/{id}',  [LikeController::class, 'postunlikes']);
Route::post('/like',  [LikeController::class, 'store']);
Route::post('/likedislike',  [LikeController::class, 'likedislike']);
Route::put('/like/{id}',  [LikeController::class, 'update']);
Route::delete('/like/{id}',  [LikeController::class, 'destroy']);

// save route
Route::get('/saves', [SaveController::class, 'saves']);
Route::post('/save', [SaveController::class, 'store']);
Route::delete('/save/{id}', [SaveController::class, 'destroy']);


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
