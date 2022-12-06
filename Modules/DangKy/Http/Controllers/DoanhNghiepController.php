<?php

namespace Modules\DangKy\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\DangKy;
use Modules\Admin\Entities\DoanhNghiep;
use DB,Hash,Mail;
use Spatie\Permission\Models\Role;

class DoanhNghiepController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->get('ten_doanh_nghiep');
        $danh_sach = DoanhNghiep::whereNull('deleted_at')
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten_doanh_nghiep)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->paginate(PER_PAGE);
        return view('dangky::doanh-nghiep.index', compact('danh_sach'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dangky::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = new DoanhNghiep();
        $data->ten_doanh_nghiep = $request->ten_doanh_nghiep;
        $data->dia_chi = $request->dia_chi;
        $data->so_dien_thoai = $request->so_dien_thoai;
        $data->save();
        return redirect()->back()->with('success', 'Thêm mới doanh nghiệp thành công !');

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
        $data = DoanhNghiep::where('id', $id)->first();
        return view('dangky::doanh-nghiep.edit', compact('data'));
    }

    public function xoaSV($id)
    {
        $data = DangKy::where('id', $id)->first();
        $data->trang_thai = DangKy::TRA_LAI;
        $data->save();
        return redirect()->back()->with('success', 'Xóa sinh viên thành công !');
    }

    public function duyetSVNhaTruong(Request $request)
    {
        $data = $request->all();
        $danhSach = $data['duyet'] ?? null;
        if (!empty($danhSach)) {
            foreach ($danhSach as $dataf) {

                $canBo = DangKy::where('id', $dataf)->first();
                $canBo->trang_thai = DangKy::CAN_BO_TRUONG_DUYET;
                $canBo->doanh_nghiep = $request->doanh_nghiep;
                $canBo->save();
            }
            return redirect()->back()->with('success', 'Gửi doanh nghiệp thành công !');
        } else {
            return redirect()->back()->with('error', 'Bạn chưa chọn sinh viên nào !');
        }
    }

    public function duyetSVDoanhNghiep(Request $request)
    {
        $mang = [];
        $data = $request->all();
        $danhSach = $data['duyet'] ?? null;
        if (!empty($danhSach)) {
            foreach ($danhSach as $dataf) {

                $Sv = DangKy::where('id', $dataf)->first();
                $Sv->trang_thai = DangKy::DOANH_NGHIEP_DUYET;
                $Sv->save();

                $user = new User();
                $user->username = $Sv->ma_sinh_vien;
                $user->password = Hash::make($Sv->ma_sinh_vien);
                $user->fullname = $Sv->ten_sinh_vien;
                $user->role_id = 13;
                $user->doanh_nghiep = $Sv->doanh_nghiep;
                $user->birthday = $Sv->ngay_sinh;
                $user->email = $Sv->email;
                $user->dang_ky = $Sv->id;
                $user->status = 1;
                $user->save();
                array_push($mang,$Sv);
                $role = Role::findById(13);
                $user->assignRole($role->name);
                $permissions = $role->permissions->pluck('name')->toArray();
                $user->syncPermissions($permissions);

                $email = $Sv->email;
                $data1['info'] = $mang;
                Mail::Send('guiMail.guiMail', $data1, function ($message) use ($email) {
                    $message->from('haithanhcx1@gmail.com', 'ThucTap');
                    $message->to($email, $email);
                    $message->subject('Thông tin tài khoản sinh viên');
                });

            }
            return redirect()->back()->with('success', 'Duyệt thành công !');
        } else {
            return redirect()->back()->with('error', 'Bạn chưa chọn sinh viên nào !');
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = DoanhNghiep::where('id', $id)->first();
        $data->ten_doanh_nghiep = $request->ten_doanh_nghiep;
        $data->dia_chi = $request->dia_chi;
        $data->so_dien_thoai = $request->so_dien_thoai;
        $data->save();
        return redirect()->route('doanh-nghiep.index')->with('success', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = DoanhNghiep::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công !');
    }
}
