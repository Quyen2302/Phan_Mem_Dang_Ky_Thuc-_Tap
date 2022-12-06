<?php

namespace Modules\DangKy\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\DangKy;
use Modules\Admin\Entities\DoanhNghiep;
use auth,DB;

class DangKyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('dangky::index');
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dangky::create');
    }
    public function NhaTruong(Request $request)
    {
        $ten = $request->get('ten_sinh_vien');
        $ma = $request->get('ma_sinh_vien');
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $danh_sach = DangKy::where('trang_thai',DangKy::CHUYEN_VIEN_GUI)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten_sinh_vien)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->where(function ($query) use ($ma) {
                if (!empty($ma)) {
                    return $query->where(DB::raw('lower(ma_sinh_vien)'), 'LIKE', "%" . mb_strtolower($ma) . "%");
                }
            })
            ->paginate(PER_PAGE);
        return view('dangky::nhaTruong',compact('danh_sach','doanhNghiep'));
    }
    public function sinhVien(Request $request)
    {
        $ten = $request->get('ten_sinh_vien');
        $ma = $request->get('ma_sinh_vien');
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $danh_sach = DangKy::where('doanh_nghiep',auth::user()->doanh_nghiep)
        ->where('trang_thai',DangKy::CAN_BO_TRUONG_DUYET)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten_sinh_vien)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->where(function ($query) use ($ma) {
                if (!empty($ma)) {
                    return $query->where(DB::raw('lower(ma_sinh_vien)'), 'LIKE', "%" . mb_strtolower($ma) . "%");
                }
            })
            ->paginate(PER_PAGE);
        return view('dangky::doanhNghiep',compact('danh_sach','doanhNghiep'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $check = DangKy::where('ma_sinh_vien', $request->ma_sinh_vien)->first();
        if ($check == null) {
            $dangKY = new DangKy();
            $dangKY->ten_sinh_vien = $request->ten_sinh_vien;
            $dangKY->ma_sinh_vien = $request->ma_sinh_vien;
            $dangKY->ngay_sinh = !empty($request->ngay_sinh) ? formatYMD($request->ngay_sinh) : null;
            $dangKY->lop = $request->lop;
            $dangKY->khoa = $request->khoa;
            $dangKY->email = $request->email;
            $dangKY->dia_chi = $request->dia_chi;
            $dangKY->so_dien_thoai = $request->so_dien_thoai;
            $dangKY->y_kien = $request->y_kien;
            $dangKY->trang_thai = DangKy::CHUYEN_VIEN_GUI;
            $dangKY->save();


            return redirect()->route('dang-ky.index')->with('success', 'Gửi thông tin thành công !');
        } else {
            return redirect()->back()->with('error', 'Sinh viên có trên hệ thống !');
        }

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
