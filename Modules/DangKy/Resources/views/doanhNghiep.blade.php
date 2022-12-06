
@extends('admin::layouts.master')
@section('page_title', 'Đăng ký')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Danh sách sinh viên nhà trường đã gửi sang</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="col-md-12 mt-1 ">
                        <div class="row">
                            <div class="col-md-8"></div>
                            <div class="col-md-3">

                            </div>
                            <div class="col-md-1">
                                <form action="{{route('duyetSVDoanhNghiep')}}" method="post" id="dangky">
                                    @csrf

                                    <button type="submit"
                                            class="btn btn-sm mt-1 btn-submit btn-primary waves-effect waves-light pull-right btn-duyet-all pull-right btn-sm mb-2"
                                            data-original-title=""
                                            title=""><i class="fa fa-check"></i> Duyệt và cấp tài khoản
                                    </button>
                                </form>

                            </div>
                        </div>



                    </div>



                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('quanly')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên sinh viên</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten_sinh_vien')}}"
                                           name="ten_sinh_vien"
                                           placeholder="Tên..">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo mã sinh viên</label>
                                    <input type="text" class="form-control" value="{{Request::get('ma_sinh_vien')}}"
                                           name="ma_sinh_vien"
                                           placeholder="Mã sinh viên">
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body" >
                        <table class="table table-bordered table-striped table-hover data-row">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">
                                    <input id="check-all" type="checkbox" name="check_all" value="">
                                </th>
                                <th width="" class="text-center">Họ và tên sinh viên</th>
                                <th width="8%" class="text-center">Mã sinh viên</th>
                                <th width="8%" class="text-center">Ngày sinh</th>
                                <th width="7%" class="text-center">Lớp</th>
                                <th width="13%" class="text-center">Khoa</th>
                                <th width="10%" class="text-center">Địa chỉ liên hệ</th>
                                <th width="10%" class="text-center">Số điện thoại</th>
                                <th width="15%" class="text-center">Ý kiến </th>
{{--                                <th width="10%" class="text-center">Tác vụ</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">
                                        <input id="checkbox{{ $data->id }}" type="checkbox" form="dangky" name="duyet[{{ $data->id }}]" value="{{ $data->id }}" class="duyet sub-check">
                                        <label for="checkbox{{ $data->id }}"></label></td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ten_sinh_vien}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ma_sinh_vien}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{formatDMY($data->ngay_sinh)}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->lop}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->khoa}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->dia_chi}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->so_dien_thoai}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->y_kien}}</td>
{{--                                    <td class="text-center">--}}
{{--                                            @csrf--}}
{{--                                            <a class="btn-action btn  btn-icon btn-light btn-sm" style="color: green !important;"--}}
{{--                                               href="" role="button" title="Sửa">--}}
{{--                                                <i class="fa fa-check"></i>--}}
{{--                                            </a>--}}
{{--                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm" style="color: red !important;"--}}
{{--                                               href="" role="button" title="Sửa">--}}
{{--                                                <i class="fa fa-close"></i>--}}
{{--                                            </a>--}}


{{--                                    </td>--}}

                                </tr>
                            @empty
                                <td class="text-center" colspan="9" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số : <b>{{ $danh_sach->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $danh_sach->appends(['ten' => Request::get('ten'),
                                       'mo_ta' => Request::get('mo_ta'),'search' =>Request::get('search') ])->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->




                </div>
            </div>
        </div>
    </section>

@endsection


@section('script')
    <script src="{{ asset('modules/quanlyvanban/js/app.js') }}"></script>
    <script type="text/javascript">
        function showModal() {
            $("#myModal").modal('show');
        }
        let allId = [];

        $(document).on('change', 'input[name=check_all]', function () {

            if ($(this).is(':checked', true)) {
                $(this).closest('.data-row').find(".sub-check").prop('checked', true);


            } else {
                $(this).closest('.data-row').find(".sub-check").prop('checked', false);
                allId = [];
            }

        });
    </script>
@endsection
