<?php

namespace Modules\Admin\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   DoanhNghiep extends Model
{
    use SoftDeletes;

    protected $table = 'doanh_nghiep';




    public function heSo()
    {
        return $this->belongsTo(HeSoTheLoai::class, 'the_loai_con', 'id');
    }
    public function phoPhong()
    {
        return $this->belongsTo(User::class, 'pho_phong_id', 'id');
    }





}

