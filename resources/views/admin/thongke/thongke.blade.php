@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thống kê
        <small>Bảng điều khiển</small>
    </h1>
</section>

@if( Auth::user()->type_employee == 1 || Auth::user()->type_employee == 2)
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">

                <div class="inner">
                    <h3>{{$array_ticket['month']??'58' }}</h3>
                    <p>Số vé đã đặt trong tháng {{$array_ticket['thang']??''}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/chitietdatve" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{number_format($array_ticket['total_month']??'' )}}VND</h3>
                    <p>Doanh thu trong tháng {{$array_ticket['thang']??''}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$array_ticket['customer']??'58' }}</h3>
                    <p>Khách hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/customer" class="small-box-footer">Chi tiết<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$array_ticket['new']??'58' }}</h3>
                    <p>Bài viết</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/user" class="small-box-footer">Chi tiết<i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
</section>

<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", //\ "light1", "light2", "dark1", "dark2"
            title: {
                text: "Biểu đồ doanh thu năm {{$thang_array['nam']}} theo tháng"
            },
            axisY: {
                title: "VND"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "VND = Tiền Việt Nam đồng",
                dataPoints: [{
                        y: {{$thang_array['thang1']??'0'}},
                        label: "Tháng 1"
                    },
                    {
                        y: {{$thang_array['thang2']??'0'}},
                        label: "Tháng 2"
                    },
                    {
                        y: {{$thang_array['thang3']??'0'}},
                        label: "Tháng 3"
                    },
                    {
                        y: {{$thang_array['thang4']??'0'}},
                        label: "Tháng 4"
                    },
                    {
                        y: {{$thang_array['thang5']??'0'}},
                        label: "Tháng 5"
                    },
                    {
                        y: {{$thang_array['thang6']??'0'}},
                        label: "Tháng 6"
                    },
                    {
                        y: {{$thang_array['thang7']??'0'}},
                        label: "Tháng 7"
                    },
                    {
                        y: {{$thang_array['thang8']??'0'}},
                        label: "Tháng 8"
                    },
                    {
                        y: {{$thang_array['thang9']??'0'}},
                        label: "Tháng 9"
                    },
                    {
                        y: {{$thang_array['thang10']??'0'}}0,
                        label: "Tháng 10"
                    },
                    {
                        y: {{$thang_array['thang11']??'0'}},
                        label: "Tháng 11"
                    },
                    {
                        y: {{$thang_array['thang12']??'0'}},
                        label: "Tháng 12"
                    }
                ]
            }]
        });
        chart.render();
    }
</script>
@else 
<section class="content">

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{($array_ticket['taixe']??'' )}} Chuyến</h3>
                    <p>Trong tháng {{$array_ticket['thang']??''}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
</section>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", //\ "light1", "light2", "dark1", "dark2"
            title: {
                text: "Biểu đồ thống kê số chuyến xe năm {{$thang_array['nam']}}, theo tháng"
            },
            axisY: {
                title: "Chuyến"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Chuyến xe",
                dataPoints: [{
                        y: {{$chuyenxe['1']??'0'}},
                        label: "Tháng 1"
                    },
                    {
                        y: {{$chuyenxe['2']??'0'}},
                        label: "Tháng 2"
                    },
                    {
                        y: {{$chuyenxe['3']??'0'}},
                        label: "Tháng 3"
                    },
                    {
                        y: {{$chuyenxe['4']??'0'}},
                        label: "Tháng 4"
                    },
                    {
                        y: {{$chuyenxe['5']??'0'}},
                        label: "Tháng 5"
                    },
                    {
                        y: {{$chuyenxe['6']??'0'}},
                        label: "Tháng 6"
                    },
                    {
                        y: {{$chuyenxe['7']??'0'}},
                        label: "Tháng 7"
                    },
                    {
                        y: {{$chuyenxe['8']??'0'}},
                        label: "Tháng 8"
                    },
                    {
                        y: {{$chuyenxe['9']??'0'}},
                        label: "Tháng 9"
                    },
                    {
                        y: {{$chuyenxe['10']??'0'}}0,
                        label: "Tháng 10"
                    },
                    {
                        y: {{$chuyenxe['11']??'0'}},
                        label: "Tháng 11"
                    },
                    {
                        y: {{$chuyenxe['12']??'0'}},
                        label: "Tháng 12"
                    }
                ]
            }]
        });
        chart.render();

    }
</script>
@endif
<body>
    <div id="chartContainer" style="height: 300px; width:100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
@endsection