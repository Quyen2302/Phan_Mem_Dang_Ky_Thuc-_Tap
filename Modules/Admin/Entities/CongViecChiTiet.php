<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   CongViecChiTiet extends Model
{
    use SoftDeletes;

    protected $table = 'cong_viec_chi_tiet';




    public function congViec()
    {
        return $this->belongsTo(CongViecChiTiet::class, 'cong_viec_id', 'id');
    }





}

