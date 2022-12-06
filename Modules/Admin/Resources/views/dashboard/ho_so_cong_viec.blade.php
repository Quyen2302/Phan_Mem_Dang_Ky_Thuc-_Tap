<div class="col-md-6 col-sm-12">
    <div class="panel panel-info">
        <div class="panel-heading col-md-12 pl-1" style="background:#3c8dbc;color:white;font-weight: bold">
            <div class="col-md-7">
                <i class="fa fa-th"></i>
                <span>&ensp;Bài viết</span>
            </div>
            <div class="col-md-5 text-center panel-bieu-do">
                <span class="text-center">Biểu đồ</span>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="panel-body">
            <div class="col-md-7 pl-1">
                @if( auth::user()->hasRole([PHONG_VIEN]))
                <a class="text-title-item" href="{{ route('phong-vien.create') }}">
                    <p>Thêm mới bài viết

                    </p>
                    <a class="text-title-item" href="{{ route('phong-vien.index') }}">
                        <p>Danh sách bài viết
                            <button
                                class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{ $danhSachBaiVietPhongVien }}</button>
                        </p>
                    </a>
                </a>
                @endif
                @if(auth::user()->hasRole([BAN_BIEN_TAP, THU_KY_TOA_SOAN, LANH_DAO_TOA_SOAN]))
                <a class="text-title-item" href="{{ route('bien-tap.index') }}">
                    <p>Bài viết chờ duyệt
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{ $baiVietChoDuyet }}</button>
                    </p>
                </a>
                @endif

                @if(auth::user()->hasRole([BAN_BIEN_TAP, THU_KY_TOA_SOAN, LANH_DAO_TOA_SOAN]))
                    <a class="text-title-item" href="{{ route('danhSachDaDuyet') }}">
                        <p>Bài viết đã duyệt
                            <button
                                class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{ $baiVietChoDuyet }}</button>
                        </p>
                    </a>
                @endif

                @if(auth::user()->hasRole([PHONG_VIEN]))
                    <a class="text-title-item" href="{{ route('danhSachTraLai') }}">
                        <p>Bài viết bị trả lại
                            <button
                                class="btn br-10 btn-pinterest btn-circle waves-effect waves-light btn-sm pull-right count-item">{{ $baiVietChoDuyet }}</button>
                        </p>
                    </a>
                @endif

            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-ho-so-cong-viec">

                </div>
            </div>
        </div>
    </div>
</div>

