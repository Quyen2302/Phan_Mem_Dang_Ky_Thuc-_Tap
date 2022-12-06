@extends('admin::layouts.master')
@section('page_title', 'Khoa')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 18px !important;">Danh sách các khoa</h3>
                    </div>
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-primary waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                             {{ isset($ngayNghi) ? 'CẬP NHẬT' : 'THÊM' }} KHOA
                        </button>
                    </div>

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse {{ isset($ngayNghi) ? 'in' : null }} " id="collapseExample">
                                <div class="row">
                                    @include('admin::khoa._form')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <form action="{{ route('khoa.index') }}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten')}}"
                                           name="ten"
                                           placeholder="Tên khoa">
                                </div>
{{--                                <div class="col-md-3 form-group">--}}
{{--                                    <label for="exampleInputEmail1">Tìm theo tên viết tắt</label>--}}
{{--                                    <input type="text" class="form-control" value="{{Request::get('ten_viet_tat')}}"--}}
{{--                                           name="ten_viet_tat"--}}
{{--                                           placeholder="Tên viết tắt">--}}
{{--                                </div>--}}
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="2%" class="text-center">STT</th>
                                <th width="20%" class="text-center">Tên khoa</th>
                                <th width="3%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($listNgayNghi as $key => $ngayNghi)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{ $key+1 }}</td>
                                    <td class="text-left"
                                        style="vertical-align: middle">{{ $ngayNghi->ten_khoa }}</td>
                                    <td class="text-center">
                                        <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"
                                           href="{{ route('khoa.index', 'id='.$ngayNghi->id) }}" role="button"
                                           title="Sửa">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form method="POST" action="{{ route('khoa.destroy', $ngayNghi->id) }}"
                                              accept-charset="UTF-8" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item"
                                                role="button" title="Xóa">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="6" style="vertical-align: middle">Không có dữ liệu !
                                </td>
                            @endforelse

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6" style="margin-top: 5px">
                                    Tổng số ngày nghỉ: <b>{{ $listNgayNghi->total() }}</b>
                                </div>
                                <div class="col-md-6 text-right">
                                    {!! $listNgayNghi->appends(['ten_ngay_nghi' => Request::get('ten_ngay_nghi')])->render() !!}
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
