<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YKienGopY extends Model
{

    protected $table = 'y_kien_gop_y_ky_xuat_ban';

    public function kyXuatBan()
    {
        return $this->belongsTo(KyXuatBan::class, 'ky_xuat_ban_id', 'id')->orderBy('created_at','desc');
    }
    public function canBo()
    {
        return $this->belongsTo(User::class, 'can_bo_id', 'id')->orderBy('created_at','desc');
    }

}

