<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguonTin extends Model
{
//    use SoftDeletes;

    protected $table = 'nguon_tin';

    public function nhomDonVi()
    {
        return $this->belongsTo(NhomDonVi::class, 'nhom_don_vi', 'id');
    }



}

