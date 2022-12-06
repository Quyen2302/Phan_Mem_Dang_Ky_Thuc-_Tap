<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeSoTheLoai extends Model
{

    protected $table = 'the_loai_he_so';
    public function theLoaiCha()
    {
        return $this->belongsTo(TheLoaiTin::class, 'the_loai_id', 'id');
    }


}

