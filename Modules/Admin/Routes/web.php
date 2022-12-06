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

Route::get('/', 'AdminController@index')->name('home');

Route::resource('nguoi-dung', 'NguoiDungController');

//nguồn tin
Route::resource('nguon-tin', 'NguonTinController');
Route::post('nguon-tin/delete/{id}', array('as' => 'xoanguontin', 'uses' => 'NguonTinController@destroy'));
//Thể loại
Route::resource('the-loai', 'TheLoaiTinController');
Route::post('the-loai/delete/{id}', array('as' => 'xoatheloai', 'uses' => 'TheLoaiTinController@destroy'));
//chuyên mục
Route::resource('chuyen-muc', 'ChuyenMucTinController');
Route::post('chuyen-muc/delete/{id}', array('as' => 'xoachuyenmuc', 'uses' => 'ChuyenMucTinController@destroy'));
Route::post('the-loai-con/delete/{id}', array('as' => 'xoaTheLoaiCon', 'uses' => 'HeSoNhuanButController@destroy'));


//
Route::resource('he-so-nhuan-but', 'HeSoNhuanButController');
Route::resource('vai-tro', 'VaiTroController');
Route::resource('chuc-nang', 'ChucNangController');
Route::resource('khoa', 'KhoaController');
Route::resource('tieu-chuan', 'TieuChuanController');
Route::resource('don-vi-to-chuc', 'ToChucController');
Route::get('lay-du-lieu', 'ToChucController@getlistcb')->name('getlistcb');
Route::get('sua-don-vi-to-chuc/{id}', array('as' => 'suadvtc', 'uses' => 'ToChucController@edit'));
Route::get('xoa-don-vi-to-chuc/{id}', array('as' => 'suadvtc', 'uses' => 'ToChucController@destroy'));
Route::get('xoa-khoa/{id}', array('as' => 'xoakhoa', 'uses' => 'KhoaController@destroy'));

//Đơn giá
Route::resource('don-gia', 'DonGiaController');
Route::post('don-gia/delete/{id}', array('as' => 'xoadongia', 'uses' => 'DonGiaController@destroy'));
//tùy chọn
Route::resource('tuy-chon', 'TuyChonController');
Route::post('tuy-chon/delete/{id}', array('as' => 'xoatuychon', 'uses' => 'TuyChonController@destroy'));
Route::get('get-chuc-vu/{id}', 'NguoiDungController@getChucVu');
Route::get('get-list-phong-ban/{id}', 'NguoiDungController@getListPhongBan');
Route::get('get-list-the-loai-con/{id}', 'NguoiDungController@getListTheLoai');
