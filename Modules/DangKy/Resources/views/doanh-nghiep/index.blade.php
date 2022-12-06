@extends('admin::layouts.master')
@section('page_title', 'doanh nghiệp')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Danh sách doanh nghiệp</h3>
                    </div>
                    <div class="col-md-3 form-group mt-4">
                        <button type="button" class="btn btn-sm btn-info waves-effect waves-light mb-1"
                                data-toggle="collapse"
                                href="#collapseExample"
                                aria-expanded="false" aria-controls="collapseExample">
                            THÊM DOANH NGHIỆP</button>
                    </div>

                    <!-- /.box-header -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="collapse " id="collapseExample">
                                <div class="row">
                                    <form role="form" action="{{route('doanh-nghiep.store')}}" method="post" enctype="multipart/form-data"
                                          id="myform">
                                        @csrf
                                        <div class="box-body">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên doanh nghiệp</label>
                                                    <input type="text" class="form-control" name="ten_doanh_nghiep" id="exampleInputEmail1"
                                                           placeholder="Tên doanh nghiệp" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="dia_chi" id="exampleInputEmail1"
                                                           placeholder="Địa chỉ" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Số điện thoại</label>
                                                    <input type="text" class="form-control" name="so_dien_thoai" id="exampleInputEmail2"
                                                           placeholder="Số điện thoại" >
                                                </div>
                                            </div>


                                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top: 20px">
                        <div class="row">
                            <form action="{{route('doanh-nghiep.index')}}" method="get">

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Tìm theo tên doanh nghiệp</label>
                                    <input type="text" class="form-control" value="{{Request::get('ten_doanh_nghiep')}}"
                                           name="ten_doanh_nghiep"
                                           placeholder="Tên..">
                                </div>
                                <div class="col-md-3" style="margin-top: 20px">
                                    <button type="submit" name="search" class="btn btn-primary"><i class="fa fa-search"></i> Tìm Kiếm</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="box-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="5%" class="text-center">STT</th>
                                <th width="" class="text-center">Tên doanh nghiệp</th>
                                <th width="15%" class="text-center">Địa chỉ </th>
                                <th width="20%" class="text-center">Số điện thoại</th>
                                <th width="10%" class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($danh_sach as $key=>$data)
                                <tr>
                                    <td class="text-center" style="vertical-align: middle">{{$key+1}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->ten_doanh_nghiep}}</td>
                                    <td class="text-left" style="vertical-align: middle">{{$data->dia_chi ?? ''}}</td>
                                    <td class="text-center" style="vertical-align: middle">{{$data->so_dien_thoai}}</td>
                                    <td class="text-center">
                                        <form method="POST" action="{{route('xoaDN',$data->id)}}">
                                            @csrf
                                            <a class="btn-action btn btn-color-blue btn-icon btn-light btn-sm"
                                               href="{{route('doanh-nghiep.edit',$data->id)}}" role="button" title="Sửa">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-action btn-color-red btn-icon btn-ligh btn-sm btn-remove-item" role="button"
                                                    title="Xóa">
                                                <i class="fa fa-trash" aria-hidden="true" style="color: red"></i>
                                            </button>
                                        </form>

                                    </td>

                                </tr>
                            @empty
                                <td class="text-center" colspan="5" style="vertical-align: middle">Không có dữ liệu !
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
