<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\UnderflowController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SubcommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//users api
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::put("/admin/user/{id}", [AuthController::class, 'updateUser']);
Route::delete("/admin/user/{id}", [AuthController::class, 'deleteUser']);
Route::get("/admin/users", [AuthController::class, 'getUsers']);

//categories api
Route::post('/categorie', [CategorieController::class, 'createCategorie']);
Route::get("/admin/categories", [CategorieController::class, 'getCategories']);
Route::put("/admin/categorie/{id}", [CategorieController::class, 'updateCategorie']);
Route::delete("/admin/categorie/{id}", [CategorieController::class, 'deleteCategorie']);

//underflows api
Route::post('/underflow', [UnderflowController::class, 'createUnderflow']);
Route::get("/admin/underflows", [UnderflowController::class, 'getUnderflows']);
Route::put("/admin/underflow/{id}", [UnderflowController::class, 'updateUnderflow']);
Route::delete("/admin/underflow/{id}", [UnderflowController::class, 'deleteUnderflow']);

//posts api
Route::post('/post', [PostController::class, 'createPost']);
Route::get("/admin/posts", [PostController::class, 'getPosts']);
Route::get("/admin/commentCountByPost/{id}", [PostController::class, 'getCommentNumberByPostId']);
Route::put("/admin/post/{id}", [PostController::class, 'updatePost']);
Route::delete("/admin/post/{id}", [PostController::class, 'deletePost']);

//comments api
Route::post('/comment', [CommentController::class, 'createComment']);
Route::get("/admin/comments", [CommentController::class, 'getComments']);
Route::put("/admin/comment/{id}", [CommentController::class, 'updateComment']);
Route::delete("/admin/comment/{id}", [CommentController::class, 'deleteComment']);

//subcomments api
Route::post('/subcomment', [SubcommentController::class, 'createSubcomment']);
Route::get("/admin/subcomments", [SubcommentController::class, 'getSubcomments']);
Route::put("/admin/subcomment/{id}", [SubcommentController::class, 'updateSubcomment']);
Route::delete("/admin/subcomment/{id}", [SubcommentController::class, 'deleteSubcomment']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('register', [UserController::class, 'register']);
// Route::post('login', [UserController::class, 'login']);
