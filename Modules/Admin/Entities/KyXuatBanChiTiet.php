<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KyXuatBanChiTiet extends Model
{
//    use SoftDeletes;

    protected $table = 'ky_xuat_ban_chi_tiet';
    public function getUrlFile()
    {
        return asset($this->tk_file_thiet_ke);
    }

}

