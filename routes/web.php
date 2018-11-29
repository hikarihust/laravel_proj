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

Route::get('thu', function () {
    $theloai = TheLoai::find(1);
    foreach ($theloai->loaitin as $loaitin) {
    	echo $loaitin->Ten."<br>";
    }
});

Route::get('thuAdminView', function () {
    return view('admin.theloai.sua');
});






Route::group(['prefix' => 'admin'],function(){

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

		Route::get('sua','TinTucController@getSua');

		Route::get('them','TinTucController@getThem');

		Route::post('them','TinTucController@postThem');

	});

	// Route group User
	Route::group(['prefix' => 'user'],function(){
		// Route URL: admin/user/danhsach
		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua','UserController@getSua');

		Route::get('them','UserController@getThem');

	});

	// Route group Comment
	Route::group(['prefix' => 'comment'],function(){
		Route::get('danhsach','CommentController@getDanhSach');

		Route::get('xoa','CommentController@Xoa');
	});

	// Route group Slide
	Route::group(['prefix' => 'slide'],function(){
		// Route URL: admin/slide/danhsach
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua','SlideController@getSua');

		Route::get('them','SlideController@getThem');

	});

	// Route group Ajax
	Route::group(['prefix'=>'ajax'], function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});

});