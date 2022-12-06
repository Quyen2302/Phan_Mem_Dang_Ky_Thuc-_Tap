<?php

namespace Modules\Admin\Http\Controllers;

use App\Common\AllPermission;
use App\Http\Controllers\Controller;
use App\Models\UserLogs;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Hash, DB, Auth, Session;
use Modules\Admin\Entities\DoanhNghiep;
use Modules\Admin\Entities\HeSoTheLoai;
use Modules\Admin\Entities\Khoa;
use Modules\Admin\Entities\NguonTin;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\NhomDonVi;
use Modules\Admin\Entities\NhomDonVi_chucVu;
use Modules\Admin\Entities\ToChuc;
use Modules\VanBanDen\Entities\VanBanDenDonVi;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
//        canPermission(AllPermission::themNguoiDung());
        $donViId = $request->get('don_vi_id') ?? null;
        $chucVuId = $request->get('chuc_vu_id') ?? null;
        $hoTen = $request->get('fullname') ?? null;
        $permission = $request->get('permission') ?? null;
        $username = $request->get('username') ?? null;
        $trangThai = $request->get('trang_thai') ?? null;
        $danhSachPhongBan = null;
        $phonBanId = $request->get('phong_ban_id') ?? null;

//        if ($donViId) {
//            $danhSachPhongBan = DonVi::where('parent_id', $donViId)->whereNull('deleted_at')->get();
//        }


        $users = User::
            where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('fullname', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($username) {
                if (!empty($username)) {
                    return $query->where('username', 'LIKE', "%$username%");
                }
            })
            ->where(function ($query) use ($trangThai) {
                if (!empty($trangThai)) {
                    return $query->where('status', $trangThai);
                }
            })
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')
            ->paginate(PER_PAGE);





        return view('admin::nguoi-dung.index', compact('users', 'danhSachPhongBan'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        canPermission(AllPermission::themNguoiDung());

        $roles = Role::all();
//        $danhSachDonVi = ToChuc::orderBy('ten_don_vi', 'asc')->get();
        $danhSachDonVi = null;
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();
        $khoa = Khoa::all();
        $giangVien = User::role([GIANG_VIEN])->whereNull('deleted_at')->get();

        return view('admin::nguoi-dung.create',
            compact('roles','danhSachDonVi','doanhNghiep','khoa','giangVien'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        canPermission(AllPermission::themNguoiDung());

        $this->validate($request,
            [
                'username' => 'required|unique:users,username',
                'password' => 'required|min:6',
                'email' => 'required|unique:users,email'
            ],
            [
                'username.required' => 'Vui lòng nhập tài khoản.',
                'username.unique' => 'Tài khoản đã tồn tại vui lòng nhập tài khoản khác',
                'email.required' => 'Vui lòng nhập email.',
                'email.unique' => 'Email đã tồn tại vui lòng nhập email khác.',
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu tối thiểu 6 kí tự.',


            ]);

        $data = $request->all();


        $user = new User();
        $user->birthday =  !empty($request->ngay_ban_hanh) ? formatYMD($request->ngay_ban_hanh) : null;
        $user->role_id =  $request->role_id;
        $user->username =  $request->username;
        $user->giang_vien =  $request->giang_vien;
        $user->khoa_id =  $request->khoa;
        $user->fullname =  $request->fullname;
        $user->doanh_nghiep =  $request->doanh_nghiep;
        $user->email =  $request->email;
        if (!empty($data['anh_dai_dien'])) {
            $inputFile = $data['anh_dai_dien'];
            $uploadPath = public_path(UPLOAD_USER);
            $folderUploads = UPLOAD_USER;

            $url = uploadFile($inputFile, $uploadPath, $folderUploads);
            $user->avatar =  $url;
        }

        $user->status =  $request->trang_thai;
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        if (!empty($request->get('role_id'))) {
            $role = Role::findById($request->get('role_id'));
            $user->assignRole($role->name);
            $permissions = $role->permissions->pluck('name')->toArray();
            $user->syncPermissions($permissions);
        }

        if (isset($data['permission'])) {
            $user->syncPermissions($data['permission']);
        }

        return redirect()->route('nguoi-dung.index')->with('success', 'Thêm mới thành công .');

    }





    public function guiXuLy(Request $request)
    {
        $nguoiDung = User::where('id', auth::user()->id)->first();
        $nguoiDung->password_email = Hash::make($request->passWord);
        $nguoiDung->save();
        return redirect('/')->with('success', 'Cập nhật thành công .');
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
//        canPermission(AllPermission::suaNguoiDung());

        $user = User::findOrFail($id);
        $donVi = $user->donVi;
        $donViId = isset($donVi) && $donVi->parent_id != 0 ? $donVi->parent_id : $donVi->id ?? null;
        $doanhNghiep = DoanhNghiep::whereNull('deleted_at')->get();

        $roles = Role::all();


        $danhSachPhongBan = null;
        if (isset($donVi) && $donVi->parent_id != 0) {
            $danhSachPhongBan = ToChuc::where('parent_id', $donVi->parent_id)->select('id', 'ten_don_vi')->get();
        }



        $permissionUser = $user->permissions;
        $arrPermissionId = $permissionUser->pluck('id')->toArray();
//        $danhSachDonVi = ToChuc::orderBy('ten_don_vi', 'asc')->get();

        $khoa = Khoa::all();
        $giangVien = User::role([GIANG_VIEN])->whereNull('deleted_at')->get();
        return view('admin::nguoi-dung.edit', compact('user', 'donViId',
            'roles',  'danhSachPhongBan', 'donVi', 'arrPermissionId','doanhNghiep','khoa','giangVien'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
//        canPermission(AllPermission::suaNguoiDung());

        $data = $request->all();



        $user = User::findOrFail($id);
        $user->birthday =  !empty($request->ngay_ban_hanh) ? formatYMD($request->ngay_ban_hanh) : null;
        $user->role_id =  $request->role_id;
        $user->username =  $request->username;
        $user->fullname =  $request->fullname;
        $user->giang_vien =  $request->giang_vien;
        $user->khoa_id =  $request->khoa;
        $user->email =  $request->email;
        $user->doanh_nghiep =  $request->doanh_nghiep;

        $data = $request->all();

        if (!empty($data['anh_dai_dien'])) {
            $inputFile = $data['anh_dai_dien'];
            $uploadPath = public_path(UPLOAD_USER);
            $folderUploads = UPLOAD_USER;
            $urlFileInDB = $user->anh_dai_dien;

            $url = uploadFile($inputFile, $uploadPath, $folderUploads, $urlFileInDB);
            $user->avatar =  $url;
        }
        if($request->trang_thai)
        {
            $user->status =  $request->trang_thai;

        }
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();
        if (!empty($request->get('role_id'))) {
            $role = Role::findById($request->get('role_id'));

            $permissions = $role->permissions->pluck('name')->toArray();

            DB::table('model_has_roles')->where('model_id', $id)->delete();
            $user->assignRole($role->name);
            $user->syncPermissions($permissions);
        }

        if (isset($data['permission'])) {
            $user->syncPermissions($data['permission']);
        }



        return redirect()->back()->with('success', 'Cập nhật thành công.');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        canPermission(AllPermission::xoaNguoiDung());

        $user = User::findOrFail($id);
        UserLogs::saveUserLogs('Xoá người dùng', $user);
        $user->delete();

        return redirect()->back()->with('success', 'Xoá thành công.');
    }
    public function getListPhongBan(Request $request, $id)
    {
        $phongBan = ToChuc::where('parent_id', $id)->select('id', 'ten_don_vi', 'parent_id')->get();

        return response()->json([
            'success' => true,
            'data' => $phongBan
        ]);
    }
    public function getListTheLoai(Request $request, $id)
    {
        $phongBan = HeSoTheLoai::where('the_loai_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $phongBan
        ]);
    }

    public function getChucVu(Request $request, $id)
    {
        if ($id == 0) {
            $ds_chucvu = NguonTin::whereNull('deleted_at')->get();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $ds_chucvu,
                    'phongBan' => null
                ]);
            }
        } else {
            $ds_chucvu = [];
            $phongBan = ToChuc::where('parent_id', $id)->select('id', 'ten_don_vi', 'parent_id')->get();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => $ds_chucvu,
                    'phongBan' => $phongBan
                ]);
            }
        }

    }

    public function getDonVi(Request $request, $id)
    {
        $nhom_don_vi = NhomDonVi::where('id', $id)->first();
        $lay_don_vi = ToChuc::where('nhom_don_vi', $nhom_don_vi->id)->get();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => $lay_don_vi
            ]);
        }
    }

    public function switchOtherUser(Request $request)
    {
        $id = $request->get('user_id');
        $new_user = User::find($id);
        Session::put( 'origin_user', Auth::id());
        Auth::login( $new_user );

        return redirect()->route('home');
    }

    public function stopSwitchUser(Request $request)
    {
        $id = Session::pull('origin_user');
        $orig_user = User::find( $id );
        Auth::login( $orig_user );
        $request->session()->forget('origin_user');

        return redirect()->route('home');
    }
}
