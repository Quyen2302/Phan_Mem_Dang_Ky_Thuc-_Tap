<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   DangKy extends Model
{
    use SoftDeletes;

    protected $table = 'dang_ky';

    const CHUYEN_VIEN_GUI = 1;
    const CAN_BO_TRUONG_DUYET = 2;
    const DOANH_NGHIEP_DUYET = 3;
    const TRA_LAI = 0;



    public function heSo()
    {
        return $this->belongsTo(HeSoTheLoai::class, 'the_loai_con', 'id');
    }
    public function phoPhong()
    {
        return $this->belongsTo(User::class, 'pho_phong_id', 'id');
    }





}

