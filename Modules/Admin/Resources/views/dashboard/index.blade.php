@extends('administrator::layouts.master')
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            @if( auth::user()->hasRole([PHONG_VIEN]))
                {{dd(1)}}
                @include('administrator::dashboard.phong_vien')
            @endif

            @if(auth::user()->hasRole([BAN_BIEN_TAP]))
                    {{dd(2)}}
                @include('admin::dashboard.bien_tap')
            @endif

            @if(auth::user()->hasRole([ THU_KY_TOA_SOAN ]))
                    {{dd(3)}}
                @include('administrator::dashboard.thu_ky')
            @endif

            @if(auth::user()->hasRole([LANH_DAO_TOA_SOAN]))
                {{dd(4)}}
                @include('administrator::dashboard.lanh_dao')
            @endif



        </div>
    </div> <!-- end container-fluid -->
@endsection
@section('script')
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChartVanChoPhanLoai);
        google.charts.setOnLoadCallback(drawChartDuThaoVanBan);
        google.charts.setOnLoadCallback(drawChartNhapVanBanDen);
        google.charts.setOnLoadCallback(drawChartNhapVanBanDi);
        google.charts.setOnLoadCallback(drawChartCongViecDonVi);
        // google.charts.setOnLoadCallback(drawChartVanBanDi);

        let dataPiceChiDao = <?php echo json_encode($chiDaoDieuHanhPiceCharts, JSON_NUMERIC_CHECK); ?>

        function drawChart() {
            let data = google.visualization.arrayToDataTable(dataPiceChiDao);
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($chiDaoDieuHanhCoLors); ?>
            };

            if (document.getElementById('piechart') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        };

        function drawChartVanChoPhanLoai() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($phanLoaiVanBanPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($phanLoaiVanBanCoLors); ?>
            };

            if (document.getElementById('pie-chart-phan-loai-van-ban') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-phan-loai-van-ban'));
                chart.draw(data, options);
            }
        };

        function drawChartDuThaoVanBan() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($duThaoPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($duThaoCoLors); ?>
            };

            if (document.getElementById('pie-chart-du-thao-van-ban') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-du-thao-van-ban'));
                chart.draw(data, options);
            }
        };

        function drawChartNhapVanBanDen() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($vanThuVanBanDenPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($vanThuVanBanDenCoLors); ?>
            };

            if (document.getElementById('pie-chart-van-thu-nhap-van-ban-den') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-van-thu-nhap-van-ban-den'));
                chart.draw(data, options);
            }
        }

        function drawChartNhapVanBanDi() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($vanThuVanBanDiPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($vanThuVanBanDiCoLors); ?>
            };

            if (document.getElementById('pie-chart-van-thu-nhap-van-ban-di') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-van-thu-nhap-van-ban-di'));
                chart.draw(data, options);
            }
        }

        function drawChartCongViecDonVi() {

            let data = google.visualization.arrayToDataTable(<?php echo json_encode($congViecDonViPiceCharts,
                JSON_NUMERIC_CHECK); ?>);

            // Optional; add a title and set the width and height of the chart
            let options = {
                'title': '',
                titleTextStyle: {
                    bold: true,
                    fontSize: 14,
                },
                legend: {position: 'none'},
                colors: <?php echo json_encode($congViecDonViCoLors); ?>
            };

            if (document.getElementById('pie-chart-cong-viec-don-vi') != undefined) {
                let chart = new google.visualization.PieChart(document.getElementById('pie-chart-cong-viec-don-vi'));
                chart.draw(data, options);
            }
        }

    </script>
@endsection
