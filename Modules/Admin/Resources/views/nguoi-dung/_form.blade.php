<form class="form-row" action="{{ isset($user) ? route('nguoi-dung.update', $user->id) : route('nguoi-dung.store') }}"
      method="post"
      enctype="multipart/form-data">
    @csrf
    @if(isset($user))
        @method('PUT')
    @endif
    <div class="box-body">
        <div class="form-group col-md-3">
            <div id="avartar-img">
                <img id="avartar"
                     src="{{ isset($user) && !empty($user->avatar) ? getUrlFile($user->avatar) : asset('images/default-user.png') }}"
                     class="img-responsive" height="248px"
                     alt="anh-dai-dien" style="margin: auto">
                <div class="col-md-12 text-center">
                    <input type="file" name="anh_dai_dien" class="hidden" onchange="readURL(this,'#avartar');">
                    <button type="button" class="btn btn-primary mt-2 waves-effect btn-sm"
                            onclick="document.getElementsByName('anh_dai_dien')[0].click();">
                        <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Ảnh
                    </button>
                </div>
            </div>
        </div>
        <div class="form-group col-md-9">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="col-form-label" for="ho-ten">Họ tên @include('admin::required')</label>
                    <input type="text" name="fullname" id="ho-ten" class="form-control" placeholder="Nhập họ tên..."
                           value="{{ old('fullname', isset($user) ? $user->fullname : '') }}" required="">
                </div>
                <div class="form-group col-md-4">
                    <label for="username" class="col-form-label">Tài khoản @include('admin::required')</label>
                    <input type="text" id="username" name="username"
                           class="form-control @error('username') is-invalid @enderror"
                           placeholder="Nhập tên tài khoản"
                           value="{{ old('username', isset($user) ? $user->username : '') }}" required="">
                    @error('username')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label class="col-form-label" for="password">Mật khẩu @include('admin::required')</label>
                    <input type="password" id="password" name="password" class="form-control"
                           placeholder="Nhập mật khẩu..." value="" {{ isset($user) ? '' : 'required' }}>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail4">Ngày sinh<span
                                style="color: red">*</span></label>
                        <div class="input-group date">
                            <input type="text" class="form-control vanbantrung ngay-ban-hanh datepicker"
                                   name="ngay_ban_hanh" id="exampleInputEmail5" value="{{isset($user) ? formatDMY($user->birthday) : null  }}"
                                   placeholder="dd/mm/yyyy" required>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar-o"></i>
                            </div>
                        </div>
                    </div>
                </div>

{{--                @if (auth::user()->hasRole(QUAN_TRI_HT))--}}
                    <div class="form-group col-md-4">
                        <label class="col-form-label" for="quyen-han">Quyền hạn <span
                                style="color: red">*</span></label>
                        <select class="form-control select2" name="role_id" required>
                            <option value="">-- Chọn quyền hạn --</option>
                            @if (count($roles) > 0)
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ isset($user) && $user->role_id == $role->id ? 'selected' : '' }}>{{ ucfirst($role->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="col-form-label" for="quyen-han">Khoa </label>
                        <select class="form-control select2" name="khoa" >
                            <option value="">--Chọn khoa -</option>
                            @foreach($khoa as $dsKHoa)
                                <option value="{{$dsKHoa->id}}" {{ isset($user) && $user->khoa_id == $dsKHoa->id ? 'selected' : '' }}>{{$dsKHoa->ten_khoa}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label" for="quyen-han">Giảng viên hướng dẫn </label>
                        <select class="form-control select2" name="giang_vien" >
                            <option value="">--Chọn giảng viên hướng dẫn -</option>
                            @foreach($giangVien as $dsGV)
                                <option value="{{$dsGV->id}}" {{ isset($user) && $user->giang_vien == $dsGV->id ? 'selected' : '' }}>{{$dsGV->fullname}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="col-form-label" for="quyen-han">Doanh nghiệp </label>
                        <select class="form-control select2" name="doanh_nghiep" >
                            <option value="">--Chọn doanh nghiệp -</option>
                            @foreach($doanhNghiep as $dsDV)
                                <option value="{{$dsDV->id}}" {{ isset($user) && $user->doanh_nghiep == $dsDV->id ? 'selected' : '' }}>{{$dsDV->ten_doanh_nghiep}}</option>
                            @endforeach

                        </select>
                    </div>
{{--                @endif--}}

                <div class="form-group col-md-4">
                    <label class="col-form-label" for="email">Email @include('admin::required')</label>
                    <input type="text" name="email" id="email" placeholder="Nhập địa chỉ email..."
                           value="{{ old('email', isset($user) ? $user->email : null) }}"
                           class="form-control @error('email') is-invalid @enderror"
                           required>
                    @error('email')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                </div>

                @if (auth::user()->hasRole(QUAN_TRI_HT))
                <div class="col-md-4">
                    <label class="col-form-label" for="trang_thai">Trạng thái</label>
                    <br>
                    <label>
                        <input type="radio" name="trang_thai" class="flat-red" value="1"
                            {{ isset($user) && $user->status == 1 ? 'checked' : 'checked' }}> Hoạt động
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="trang_thai" class="flat-red" value="2"
                            {{ isset($user) && $user->status == 2 ? 'checked' : '' }}
                        > Tạm khóa
                    </label>
                </div>
                @endif
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit"
                    class="btn btn-primary waves-effect text-uppercase btn-sm">{{ isset($user) ? 'Cập nhật' : 'Tạo mới tài khoản' }}</button>
            <a href="{{ route('nguoi-dung.index') }}" title="hủy" class="btn btn-default btn-sm">Hủy</a>
        </div>
    </div>
</form>
