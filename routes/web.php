<?php

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

use App\Models\TheLoai;

Route::get('/', function () {
    return view('welcome');
});

// ------------------ Test Laravel --------------------
Route::get('thu', function () {
    $theloai = TheLoai::find(1);
    foreach ($theloai->loaitin as $loaitin) {
    	echo $loaitin->Ten."<br>";
    }
});

Route::get('thuAdminView', function () {
    return view('admin.theloai.sua');
});
// -----------------------------------------------------

Route::get('admin/dangnhap', 'UserController@getDangnhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangnhapAdmin');
Route::get('admin/logout', 'UserController@getDangXuatAdmin');


Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'],function(){

	// Route group The Loai
	Route::group(['prefix' => 'theloai'],function(){
		// Route URL: admin/theloai/danhsach
		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');
		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('them','TheLoaiController@getThem');
		Route::post('them','TheLoaiController@postThem');

		Route::get('xoa/{id}','TheLoaiController@getXoa');

	});

	// Route group Loai Tin
	Route::group(['prefix' => 'loaitin'],function(){
		// Route URL: admin/loaitin/danhsach
		Route::get('danhsach','LoaiTinController@getDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSua');
		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');
		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}','LoaiTinController@getXoa');

	});

	// Route group Tin Tuc
	Route::group(['prefix' => 'tintuc'],function(){
		// Route URL: admin/tintuc/danhsach
		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');
		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');
		Route::post('them','TinTucController@postThem');

		Route::get('xoa/{id}', 'TinTucController@getXoa');

	});

	// Route group Comment
	Route::group(['prefix' => 'comment'],function(){

		Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
	});

	// Route group Slide
	Route::group(['prefix' => 'slide'],function(){
		// Route URL: admin/slide/danhsach
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}', 'SlideController@getXoa');

	});

	// Route group User
	Route::group(['prefix' => 'user'],function(){
		// Route URL: admin/user/danhsach
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('xoa/{id}', 'UserController@getXoa');

	});

	// Route group Ajax
	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});
});



Route::get('trangchu', 'PagesController@trangchu');
Route::get('lienhe', 'PagesController@lienhe');
Route::get('loaitin/{id}/{TenKhongDau}.html', 'PagesController@loaitin');
Route::get('tintuc/{id}/{TenKhongDau}.html', 'PagesController@tintuc');

Route::get('dangnhap', 'PagesController@getDangnhap');
Route::post('dangnhap', 'PagesController@postDangnhap');
Route::get('dangxuat', 'PagesController@getDangxuat');