<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KyXuatBan extends Model
{
//    use SoftDeletes;

    protected $table = 'ky_xuat_ban';

    public function LayBaiViet($id)
    {
        $BaiViet = [];
        $kyXuatBan = KyXuatBanChiTiet::where('ky_xuat_ban_id',$id)->orderBy('version','desc')->first();
        if($kyXuatBan)
        {
            $arrayBaiViet = json_decode($kyXuatBan->bai_viet_array);
            if(count($arrayBaiViet) > 0 && !empty($arrayBaiViet))
            {
                foreach ($arrayBaiViet as $data)
                {
                    $baiViet = BaiViet::where('id',$data)->first();
                    if($baiViet)
                    {
                        array_push($BaiViet, $baiViet);
                    }
                }
            }
            return $BaiViet;
        }

        return $BaiViet;
    }
    public function kyXuatBanChiTiet()
    {
        return $this->belongsTo(KyXuatBanChiTiet::class, 'id', 'ky_xuat_ban_id')->orderBy('version','desc');
    }
    public function yKien()
    {
        return $this->hasMany(YKienGopY::class, 'ky_xuat_ban_id', 'id')->orderBy('created_at','desc');
    }
}

