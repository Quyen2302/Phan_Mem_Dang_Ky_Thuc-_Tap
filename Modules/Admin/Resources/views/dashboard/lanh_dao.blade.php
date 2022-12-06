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

                <a class="text-title-item" href="{{ route('lanh-dao.index') }}">
                    <p>Bài viết chờ duyệt
                        <button
                            class="btn br-10 btn-success btn-circle waves-effect waves-light btn-sm pull-right count-item">{{ $baiVietChoDuyet }}</button>
                    </p>
                </a>

                <a class="text-title-item" href="{{ route('danhSachDaDuyet') }}">
                    <p>Bài viết đã duyệt
                        <button
                            class="btn br-10 btn-warning btn-circle waves-effect waves-light btn-sm pull-right count-item">{{ $baiVietChoDuyet }}</button>
                    </p>
                </a>



            </div>
            <div class="col-md-5 ">
                <div id="pie-chart-ho-so-cong-viec">

                </div>
            </div>
        </div>
    </div>
</div>

