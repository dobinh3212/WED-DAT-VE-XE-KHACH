@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thống kê
        <small>Bảng điều khiển</small>
    </h1>
</section>

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
                    <h3>{{$array_ticket['total_month']??'' }}VND</h3>
                    <p>Doanh thu trong tháng {{$array_ticket['thang']??''}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/chitietdatve" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
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
                    <h3>{{ $numUser??'47' }}</h3>
                    <p>Bài viết</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                text: "Biểu đồ doanh thu theo tháng"
            },
            axisY: {
                title: "Reserves(MMbbl)"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "MMbbl = one million barrels",
                dataPoints: [{
                        y: 300878,
                        label: "Tháng 1"
                    },
                    {
                        y: 266455,
                        label: "Tháng 2"
                    },
                    {
                        y: 169709,
                        label: "Tháng 3"
                    },
                    {
                        y: 158400,
                        label: "Tháng 4"
                    },
                    {
                        y: 142503,
                        label: "Tháng 5"
                    },
                    {
                        y: 0,
                        label: "Tháng 6"
                    },
                    {
                        y: 0,
                        label: "Tháng 7"
                    },
                    {
                        y: 0,
                        label: "Tháng 8"
                    },
                    {
                        y: 0,
                        label: "Tháng 9"
                    },
                    {
                        y: 0,
                        label: "Tháng 10"
                    },
                    {
                        y: 0,
                        label: "Tháng 11"
                    },
                    {
                        y: 0,
                        label: "Tháng 12"
                    }
                ]
            }]
        });
        chart.render();

    }
</script>

<body>
    <div id="chartContainer" style="height: 300px; width:50%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
@endsection