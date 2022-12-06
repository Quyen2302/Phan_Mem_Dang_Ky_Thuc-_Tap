<?php

namespace Modules\DangKy\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB, Hash;
use Modules\Admin\Entities\CongViec;
use auth,File;
use Modules\Admin\Entities\CongViecChiTiet;

class GiaoViecController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->get('noi_dung');
        $CongViec = CongViec::whereNull('deleted_at')
            ->where('sinh_vien_id', auth::user()->id)
            ->where('trang_thai', 1)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(noi_dung)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->paginate(PER_PAGE);
        return view('dangky::cong-viec.index', compact('CongViec'));
    }
    public function congViecDaGiao(Request $request)
    {
        $ten = $request->get('noi_dung');
        $CongViec = CongViec::whereNull('deleted_at')
            ->where('nguoi_giao', auth::user()->id)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(noi_dung)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->paginate(PER_PAGE);
        return view('dangky::cong-viec.CongViecDaGiao', compact('CongViec'));
    }

    public function congViecDaHoanThanh(Request $request)
    {
        $ten = $request->get('noi_dung');
        $CongViec = CongViec::whereNull('deleted_at')
            ->where('nguoi_giao', auth::user()->id)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(noi_dung)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })->where('trang_thai', 3)
            ->paginate(PER_PAGE);
        return view('dangky::cong-viec.CongViecHT', compact('CongViec'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $sinhVien = User::role([SINH_VIEN])->get();
        return view('dangky::cong-viec.create', compact('sinhVien'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $cv = new CongViec();
        $cv->sinh_vien_id = $request->sinh_vien_id;
        $cv->nguoi_giao = auth::user()->id;
        $cv->han_xu_ly = !empty($request->han_xu_ly) ? formatYMD($request->han_xu_ly) : date('Y-m-d');
        $cv->noi_dung = $request->noi_dung;
        $cv->trang_thai = 1;
        $cv->save();
        if($request->file)
        {
            $uploadPath = UPLOAD_FILE_CONG_VIEC;
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            $fileName = date('Y_m_d') . '_' . Time() . '_' . $request->file->getClientOriginalName();
            $urlFile = UPLOAD_FILE_CONG_VIEC . '/' . $fileName;
            $request->file->move($uploadPath, $fileName);
            $cv->file = $urlFile;
            $cv->save();
        }
        $noiDungCt = $request->noi_dung_ct;
        $hanXuLy = $request->han_xu_ly_ct;
        if ($noiDungCt && count($noiDungCt) > 0) {
            foreach ($noiDungCt as $key => $item2) {
                if ($item2) {
                    $noiDUng = new CongViecChiTiet();
                    $noiDUng->cong_viec_id = $cv->id;
                    $noiDUng->noi_dung = $item2;
                    $noiDUng->han_xu_ly = !empty($hanXuLy[$key]) ? formatYMD($hanXuLy[$key]) : date('Y-m-d');
                    $noiDUng->save();
                }
            }
        }else{
            $noiDUng = new CongViecChiTiet();
            $noiDUng->cong_viec_id = $cv->id;
            $noiDUng->noi_dung = $request->noi_dung;
            $noiDUng->han_xu_ly = !empty($request->han_xu_ly) ? formatYMD($request->han_xu_ly) : date('Y-m-d');
            $noiDUng->save();
        }
        return redirect()->back()->with('success', 'Thêm công việc thành công !');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dangky::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dangky::edit');
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
}
