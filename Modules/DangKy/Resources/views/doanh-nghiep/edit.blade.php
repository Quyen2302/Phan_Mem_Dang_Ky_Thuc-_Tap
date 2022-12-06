@extends('admin::layouts.master')
@section('page_title', 'doanh nghiệp')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Cập nhật doanh nghiệp</h3>
                    </div>
                    <form action="{{route('doanh-nghiep.update',$data->id)}}" method="post" enctype="multipart/form-data"
                          id="myform">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên doanh nghiệp <span style="color: red">(*)</span></label>
                                    <input type="text" class="form-control" name="ten_doanh_nghiep" id="exampleInputEmail1"
                                           placeholder="Tên doanh nghiệp" value="{{$data->ten_doanh_nghiep}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ <span style="color: red">(*)</span></label>
                                    <input type="text" class="form-control" name="dia_chi" id="exampleInputEmail1"
                                           placeholder="Địa chỉ" value="{{$data->dia_chi}}" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail2">Số điện thoại <span style="color: red">(*)</span></label>
                                    <input type="text" class="form-control" name="so_dien_thoai" id="exampleInputEmail2"
                                           placeholder="Số điện thoại" value="{{$data->so_dien_thoai}}" required>
                                </div>
                            </div>


                            <div class="col-md-3 text-left" style="margin-top: 20px">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
