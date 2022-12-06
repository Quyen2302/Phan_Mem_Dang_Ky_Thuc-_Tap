<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   BaiViet extends Model
{

    protected $table = 'bai_viet';
    const BAI_VIET_TRA_LAI = 0;

    const CHUYEN_VIEN = 1;
    const PHO_PHONG_NHAN_BV = 2;
    const TRUONG_PHONG_NHAN_BV = 3;
    const THU_KY_NHAN_BV = 4;
    const BIEN_TAP_NHAN_BV = 5;
    const THU_KY_NHAN_BV_TU_BIEN_TAP = 6;
    const THU_KY_TRA_LAI_BV_BIEN_TAP = 16;
    const LANH_DAO_NHAN_BV = 7;
    const DOI_NGU_THIET_KE_NHAN_VB = 8;
    const LANH_DAO_TRA_LAI_BIEN_TAP = 9;
    const BAI_VIET_DA_TAO_KY_XUAT_BAN_CHO_DUYET = 10;


    public function heSo()
    {
        return $this->belongsTo(HeSoTheLoai::class, 'the_loai_con', 'id');
    }
    public function phoPhong()
    {
        return $this->belongsTo(User::class, 'pho_phong_id', 'id');
    }
    public function truongPhong()
    {
        return $this->belongsTo(User::class, 'truong_phong_id', 'id');
    }
    public function thuKy()
    {
        return $this->belongsTo(User::class, 'thu_ky_id', 'id');
    }

    public function lanhDao()
    {
        return $this->belongsTo(User::class, 'lanh_dao_id', 'id');
    }

    public function thietKe()
    {
        return $this->belongsTo(User::class, 'thiet_ke', 'id');
    }
    public function bienTap()
    {
        return $this->belongsTo(User::class, 'bien_tap_id', 'id');
    }

    public function xuongIn()
    {
        return $this->belongsTo(User::class, 'xuong_in', 'id');
    }

    public function theLoai()
    {
        return $this->belongsTo(TheLoaiTin::class, 'the_loai_id', 'id');
    }

    public function chuyenMuc()
    {
        return $this->belongsTo(ChuyenMucTin::class, 'chuyen_muc_id', 'id');
    }
    public function baiVietChiTiet()
    {
        return $this->belongsTo(BaiVietChiTiet::class, 'id', 'bai_viet_id')->orderBy('created_at','desc');
    }





}

