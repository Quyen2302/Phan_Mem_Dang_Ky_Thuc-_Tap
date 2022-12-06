<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiVietChiTiet extends Model
{

    protected $table = 'bai_viet_chi_tiet';

    const DUYET = 2;
    const TRA_LAI = 1;

    public function getUrlFile()
    {
        return asset($this->tep_tin);
    }

    public function baiViet()
    {
        return $this->belongsTo(BaiViet::class, 'bai_viet_id', 'id');
    }

}

