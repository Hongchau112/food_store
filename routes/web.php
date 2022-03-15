<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
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

Route::get('admin/login', function(){
    return view('admin.users.login');
});
Route::get('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/register', [AuthController::class, 'register'])->name('admin.register');
Route::post('admin/register_auth', [AuthController::class, 'register_auth'])->name('admin.register_auth');


//Route::post('admin/login_auth', [AuthController::class, 'login_auth'])->name('admin.login_auth');

Route::middleware(['admin'])->name('admin.')->group(function () {
    //auth controller
//    Route::get('admin/register', [AuthController::class, 'register-auth'])->name('register');


    Route::get('admin/', [AdminController::class, 'index'])->name('index');
    Route::get('admin/create', [AdminController::class, 'create'])->name('create');
    Route::post('admin/store', [AdminController::class, 'store'])->name('store');
    Route::get('admin/show/{id}', [AdminController::class, 'show'])->name('show');
    Route::get('admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::patch('admin/update/{id}', [AdminController::class, 'update'])->name('update');
    Route::get('admin/block/{id}', [AdminController::class, 'block'])->name('block');
    Route::get('admin/edit_password/{id}', [AdminController::class, 'edit_password'])->name('edit_password');
    Route::post('admin/change_password/{id}', [AdminController::class, 'change_password'])->name('change_password');

    //food categories
    Route::get('admin/food_categories', [FoodCategoryController::class, 'index'])->name('food_categories.index');
    Route::get('admin/food_categories/create', [FoodCategoryController::class, 'create'])->name('food_categories.create');
    Route::post('admin/food_categories/store', [FoodCategoryController::class, 'store'])->name('food_categories.store');
    Route::get('admin/food_categories/edit/{id}', [FoodCategoryController::class, 'edit'])->name('food_categories.edit');
    Route::patch('admin/food_categories/update/{id}', [FoodCategoryController::class, 'update'])->name('food_categories.update');
    Route::get('admin/food_categories/delete/{id}', [FoodCategoryController::class, 'delete'])->name('food_categories.delete');
//foods
    Route::get('admin/foods/', [FoodController::class, 'index'])->name('foods.index');
    Route::get('admin/foods/create', [FoodController::class, 'create'])->name('foods.create');
    Route::post('admin/foods/store', [FoodController::class, 'store'])->name('foods.store');
    Route::get('admin/foods/show/{id}', [FoodController::class, 'show'])->name('foods.show');
    Route::get('admin/foods/edit/{id}', [FoodController::class, 'edit'])->name('foods.edit');
    Route::patch('admin/foods/update/{id}', [FoodController::class, 'update'])->name('foods.update');
    Route::get('admin/foods/delete/{id}', [FoodController::class, 'delete'])->name('foods.delete');

});

//user controller
Route::get('users', [UserController::class, 'index'])->name('user.index');
Route::post('user/assign_roles', [UserController::class, 'assign_roles'])->name('user.assign_roles');





