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

Route::prefix('dangky')->group(function() {
    Route::get('/', 'DangKyController@index');
});
Route::resource('dang-ky', 'DangKyController');
Route::resource('doanh-nghiep', 'DoanhNghiepController');
Route::get('duyet-sinh-vien-gui-doanh-nghiep', 'DangKyController@NhaTruong')->name('nhaTruong');
Route::post('xoa-doanh-nghiep/delete/{id}', array('as' => 'xoaDN', 'uses' => 'DoanhNghiepController@destroy'));
Route::post('xoa-sinh-vien/delete/{id}', array('as' => 'xoaSV', 'uses' => 'DoanhNghiepController@XoaSV'));
Route::post('duyet-sinh-vien', array('as' => 'duyetSVNhaTruong', 'uses' => 'DoanhNghiepController@duyetSVNhaTruong'));
Route::post('duyet-sinh-vien-doanh-nghiep', array('as' => 'duyetSVDoanhNghiep', 'uses' => 'DoanhNghiepController@duyetSVDoanhNghiep'));
Route::get('quan-ly-sinh-vien', 'DangKyController@sinhVien')->name('quanly');

//công việc
Route::resource('cong-viec', 'GiaoViecController');
Route::get('danh-sach-cong-viec-da-giao', 'GiaoViecController@congViecDaGiao')->name('congViecDaGiao');
Route::get('danh-sach-cong-viec-hoan-thanh', 'GiaoViecController@congViecDaHoanThanh')->name('congViecDaHoanThanh');
