@extends('admin::layouts.master')
@section('page_title', 'Giao việc')
@section('content')
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="font-size: 16px !important;">Tạo công việc </h3>
                    </div>


                    <!-- /.box-header -->

                    <div class="box-body">

                        <form action="{{route('cong-viec.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-12">
                                <label class="col-form-label" for="password">Nội dung công <span
                                        style="color: red">*</span> </label>
                                <textarea name="noi_dung" class="form-control" id=""required ></textarea>
                            </div>
                            <div class="form-group col-md-12 text-right">
                                <a role="button" class="btn btn-primary" onclick="themct()" style="cursor: pointer"><i class="fa fa-plus-square"></i> Thêm công việc chi tiết</a>
                            </div>
                            <div class="form-group col-md-12 ">
                                <div class="row themtt"></div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="col-form-label" for="quyen-han">Sinh viên thực hiện<span
                                        style="color: red">*</span> </label>
                                <select class="form-control select2" name="sinh_vien_id" required>
                                    <option value="">- Chọn sinh viên -</option>
                                    @foreach($sinhVien as $dsDV)
                                        <option value="{{$dsDV->id}}">{{$dsDV->fullname}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail4">Hạn xử lý<span
                                            style="color: red">*</span></label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control datepicker"
                                               name="han_xu_ly" id="exampleInputEmail5" value=""
                                               placeholder="dd/mm/yyyy" required>
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail4">File</label>
                                <input type="file" class="form-control han-xu-ly"  name="file" value="">
                            </div>
                            <div class="col-md-12 mt-2 mb-4">
                                <button type="submit" class="btn btn-primary waves-effect text-uppercase btn-sm"><i class="fa fa-check"></i> Hoàn thành</button>

                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        $("body").on("click", ".btn-remove-file", function () {
console.log(1);
            $(this).parents(".remove-multi-file").remove();
        });
        function themct() {
            let htmlForm = `
                <div class="remove-multi-file">
                            <div class="form-group col-md-8 ">
                                <label class="col-form-label" for="password"><span style="color: red">(-)</span> Nội dung chi tiết </label>
                                <textarea name="noi_dung_ct[]" class="form-control" id="" ></textarea>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail4">Hạn xử lý</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control datepicker"
                                               name="han_xu_ly_ct[]" id="exampleInputEmail5" value=""
                                               placeholder="dd/mm/yyyy" >
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-2 input-group-btn customize-group-btn mt-4">
                                    <span class="btn btn-danger btn-remove-file btn-sm" type="button">
                                    <i class="fa fa-close"></i></span>
                            </div>
                </div>`;

        $('.themtt').append(htmlForm);
        }
    </script>
@endsection
