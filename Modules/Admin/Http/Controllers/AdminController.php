<?php

namespace Modules\Admin\Http\Controllers;

use App\Common\AllPermission;
use App\Models\LichCongTac;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, DB;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Entities\BaiViet;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\LoaiVanBan;
use Modules\Admin\Entities\SoVanBan;
use Modules\CongViecDonVi\Entities\ChuyenNhanCongViecDonVi;
use Modules\CongViecDonVi\Entities\CongViecDonViGiaHan;
use Modules\CongViecDonVi\Entities\CongViecDonViPhoiHop;
use Modules\CongViecDonVi\Entities\GiaiQuyetCongViecDonVi;
use Modules\DieuHanhVanBanDen\Entities\ChuyenVienPhoiHop;
use Modules\DieuHanhVanBanDen\Entities\GiaHanVanBan;
use Modules\DieuHanhVanBanDen\Entities\GiaiQuyetVanBan;
use Modules\DieuHanhVanBanDen\Entities\LanhDaoXemDeBiet;
use Modules\DieuHanhVanBanDen\Entities\VanBanQuanTrong;
use Modules\DieuHanhVanBanDen\Entities\VanBanTraLai;
use Modules\LayVanBanTuEmail\Entities\GetEmail;
use Modules\LichCongTac\Entities\ThanhPhanDuHop;
use Modules\VanBanDen\Entities\VanBanDen;
use Modules\VanBanDi\Entities\CanBoPhongDuThao;
use Modules\VanBanDi\Entities\CanBoPhongDuThaoKhac;
use Modules\VanBanDi\Entities\Duthaovanbandi;
use Modules\VanBanDi\Entities\NoiNhanVanBanDi;
use Modules\VanBanDi\Entities\VanBanDi;
use Modules\VanBanDi\Entities\VanBanDiChoDuyet;
use Modules\DieuHanhVanBanDen\Entities\XuLyVanBanDen;
use Modules\DieuHanhVanBanDen\Entities\DonViChuTri;
use Modules\DieuHanhVanBanDen\Entities\DonViPhoiHop;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


    public function index()
    {
        $baiVietPiceCharts = [];
        $baiVietCoLors = [];
        $baiVietChoDuyet = 0;
        $baiVietDaDuyet = 0;
        $danhSachBaiVietBiTraLai = 0;
        $danhSachBaiVietPhongVien = 0;
        $user = auth::user();
        if ($user->hasRole(QUAN_TRI_HT)) {
            return redirect()->route('nguoi-dung.index');
        }
        if ($user->hasRole(NHA_TRUONG)) {
            return redirect()->route('nhaTruong');
        }
        if ($user->hasRole(DOANH_NGHIEP)) {
            return redirect()->route('quanly');
        }
        if ($user->hasRole(SINH_VIEN)) {
            return redirect()->route('cong-viec.index');
        }

        dd(auth::user());

        switch (auth::user()->roles->pluck('name')[0]) {
            case BAN_BIEN_TAP:
                $status = 2;
                $baiVietChoDuyet = BaiViet::where('bien_tap_id',auth::user()->id)->where('status', $status)->count();
                break;
            case THU_KY_TOA_SOAN:
                $status = 3;
                $baiVietChoDuyet = BaiViet::where('thu_ky_id',auth::user()->id)->where('status', $status)->count();
                break;
            case LANH_DAO_TOA_SOAN:
                $status = 4;
                $baiVietChoDuyet = BaiViet::where('lanh_dao_id',auth::user()->id)->where('status', $status)->count();
                break;
            case THIET_KE:
                $status = 5;
                $baiVietChoDuyet = BaiViet::where('thiet_ke',auth::user()->id)->where('status', $status)->count();
                break;
            case XUONG_IN:
                $status = 6;
                $baiVietChoDuyet = BaiViet::where('xuong_in',auth::user()->id)->where('status', $status)->count();
                break;


        }
        switch (auth::user()->roles->pluck('name')[0]) {
            case BAN_BIEN_TAP:
                $status = 3;
                $baiVietDaDuyet = BaiViet::where('bien_tap_id',auth::user()->id)->where('status','>', $status)->count();
                break;
            case THU_KY_TOA_SOAN:
                $status = 4;
                $baiVietDaDuyet = BaiViet::where('thu_ky_id',auth::user()->id)->where('status','>', $status)->count();
                break;
            case LANH_DAO_TOA_SOAN:
                $status = 5;
                $baiVietDaDuyet = BaiViet::where('lanh_dao_id',auth::user()->id)->where('status','>', $status)->count();
                break;
            case THIET_KE:
                $status = 6;
                $baiVietDaDuyet = BaiViet::where('thiet_ke',auth::user()->id)->where('status','>', $status)->count();
                break;
            case XUONG_IN:
                $status = 7;
                $baiVietDaDuyet = BaiViet::where('xuong_in',auth::user()->id)->where('status','>', $status)->count();
                break;


        }

        array_push($baiVietPiceCharts, array('Task', 'Danh sách'));

        array_push($baiVietPiceCharts, array('Bài viết đã duyệt', $baiVietDaDuyet));
        array_push($baiVietCoLors, COLOR_WARNING);



        if ($user->hasRole(PHONG_VIEN)) {
            $danhSachBaiVietPhongVien = BaiViet::where('nguoi_dang',auth::user()->id)->orderBy('created_at', 'desc')->count();
            $danhSachBaiVietBiTraLai = BaiViet::where('status', 0)->orderBy('created_at', 'desc')->count();
            array_push($baiVietPiceCharts, array('Bài viết bị trả lại', $danhSachBaiVietBiTraLai));
            array_push($baiVietCoLors, COLOR_RED);
            array_push($baiVietPiceCharts, array('Danh sách bài viết', $danhSachBaiVietPhongVien));
            array_push($baiVietCoLors, COLOR_GREEN);

        }














        return view('admin::index',
            compact(
            'baiVietChoDuyet',
                'danhSachBaiVietBiTraLai',
                'baiVietPiceCharts',
                'baiVietCoLors',
                'baiVietDaDuyet',
                'danhSachBaiVietPhongVien'

        ));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function createBackup()
    {
        try {
            // start the backup process
            Artisan::call('backup:run --only-db');
            $output = Artisan::output();
            // log the results
            Log::info("Backpack\BackupManager -- new backup started from admin interface \r\n" . $output);
            // return the results as a response to the ajax call
            return redirect()->back()->with('success', 'Tạo mới sao lưu thành công.');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back();
        }
    }

    public function exportDatabase()
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        $files = $disk->files(config('backup.backup.name'));
        $backups = [];
        foreach ($files as $k => $f) {

            // only take the zip files into account
            if (substr($f, -4) == '.zip' && $disk->exists($f)) {
                $backups[] = [
                    'file_path' => $f,
                    'file_name' => str_replace(config('backup.backup.name') . '/', '', $f),
                    'file_size' => $disk->size($f),
                    'last_modified' => $disk->lastModified($f),
                ];
            }
        }

        // reverse the backups, so the newest one would be on top
        $backups = array_reverse($backups);

        return view('admin::backup.index', compact('backups'));
    }

    public function downloadBackup($file_name)
    {
        $file = config('backup.backup.name') . '/' . $file_name;

        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists($file)) {
            $fs = Storage::disk(config('backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($file);

            return \Response::stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($file),
                "Content-Length" => $fs->getSize($file),
                "Content-disposition" => "attachment; filename=\"" . basename($file) . "\"",
            ]);
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }

    public function deleteBackup($file_name)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
        if ($disk->exists(config('backup.backup.name') . '/' . $file_name)) {
            $disk->delete(config('backup.backup.name') . '/' . $file_name);
            return redirect()->back()->with('success', "Đã xoá sao lưu dữ liệu!");
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
}
