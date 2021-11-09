<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DetailSimController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\CateSimController;
use App\Http\Controllers\CustomerSimController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
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
//     return view('welcome');
// });
Route::get('/',[HomeController::class, 'index'])->name('font-end.index');
Route::get('bai-viet',[PostController::class, 'index'])->name('font-end.post');
Route::get('chi-tiet-bai-viet/{id}',[PostController::class, 'detail_post'])->name('font-end.detail-post');
Route::get('search',[HomeController::class, 'search']);
//detail
Route::get('/chi-tiet-sim/{id}',[HomeController::class, 'detail'])->name('font-end.detail');

Route::get('chi-tiet-danh-muc/{id}',[HomeController::class, 'detail_cate'])->name('font-end.detail_cate');
Route::get('chi-tiet',[HomeController::class, 'detail_catei'])->name('font-end.detail_catei');

Route::post('store-dat-sim', [CustomerSimController::class,'store'])->name('store.customer_sim');
Route::get('dat-sim-thanh-cong', [CustomerSimController::class,'dat_hang'])->name('dat_hang.customer_sim');

//detail-table
Route::get('danh-sach-sim-viettel',[HomeController::class, 'detail_table_viettel'])->name('font-end.detail_table_viettel');
Route::get('danh-sach-sim-vina',[HomeController::class, 'detail_table_vina'])->name('font-end.detail_table_vina');
// Route::get('detail-table-vns',[HomeController::class, 'detail_table_vns'])->name('font-end.detail_table_vns');
Route::get('danh-sach-sim-mobi',[HomeController::class, 'detail_table_mobi'])->name('font-end.detail_table_mobi');

Route::get('dang-nhap',[HomeController::class, 'login'])->name('font-end.login');
Route::post('post-login',[HomeController::class, 'postLogin'])->name('font-end.postLogin');

Route::get('lien-he',[HomeController::class, 'contact'])->name('font-end.contact');

//admin
Route::group([
    'middleware'=>'checkAdminLogin',
], function(){
    Route::prefix('quan-ly')->group(function () {
        Route::get('',[AdminController::class,'index'])->name('admin.index');
        
        Route::get('dat-sim', [CustomerSimController::class,'index'])->name('index.customer_sim');
        Route::get('xoa-dat-sim/{id}', [CustomerSimController::class,'destroy'])->name('destroy.customer_sim');
        Route::get('ac-dat-sim/{id}', [CustomerSimController::class,'active'])->name('ac.customer_sim');
        Route::get('unac-dat-sim/{id}', [CustomerSimController::class,'unactive'])->name('unac.customer_sim');

        //danh muc
        Route::get('danh-muc-sim',[CateSimController::class,'index'])->name('admin.cate-sim');
        Route::get('them-danh-muc-sim',[CateSimController::class,'create'])->name('admin.add-cate-sim');
        Route::post('them-danh-muc-sim',[CateSimController::class,'store'])->name('admin.post-cate-sim');
        Route::get('sua-danh-muc-sim/{id}',[CateSimController::class,'edit'])->name('admin.edit-cate-sim');
        Route::post('sua-danh-muc-sim/{id}',[CateSimController::class,'update'])->name('admin.update-cate-sim');
        Route::get('xoa-danh-muc-sim/{id}',[CateSimController::class,'destroy'])->name('admin.delete-cate-sim');

        //sim
        Route::get('/sim',[SimController::class,'index'])->name('admin.sim');
        Route::get('them-sim',[SimController::class,'create'])->name('admin.add-sim');
        Route::post('them-sim',[SimController::class,'store'])->name('admin.store-sim');
        Route::get('sua-sim/{id}',[SimController::class,'edit'])->name('admin.edit-sim');
        Route::post('sua-sim/{id}',[SimController::class,'update'])->name('admin.update-sim');
        Route::get('xoa-sim/{id}',[SimController::class,'destroy'])->name('admin.destroy-sim');
        Route::get('ac-sim/{id}',[SimController::class,'active'])->name('admin.ac-sim');
        Route::get('unac-sim/{id}',[SimController::class,'unactive'])->name('admin.unac-sim');

        Route::get('list-user',[UserController::class, 'index'])->name('admin.user');
        Route::get('add-user',[UserController::class, 'create'])->name('admin.user.create');
        Route::post('add-user',[UserController::class, 'store'])->name('admin.user.store');
        Route::get('destroy-user/{id}',[UserController::class, 'destroy'])->name('admin.user.destroy');

        //bai viet
        Route::get('bai-viet',[BlogController::class,'index'])->name('admin.blog');
        Route::get('them-bai-viet',[BlogController::class,'create'])->name('admin.blog.create');
        Route::post('them-bai-viet',[BlogController::class,'store'])->name('admin.blog.store');
        Route::get('xoa-bai-viet/{id}',[BlogController::class,'destroy'])->name('admin.blog.destroy');
        Route::get('kich-hoat-bai-viet/{id}',[BlogController::class,'active'])->name('admin.blog.active');
        Route::get('an-bai-viet/{id}',[BlogController::class,'unactive'])->name('admin.blog.unactive');

        Route::get('logout',[HomeController::class,'logOut'])->name('admin.logout');
    });
});