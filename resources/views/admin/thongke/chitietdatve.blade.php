@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thống kê
        <small>Bảng điều khiển</small>
    </h1>
</section>
<br>

   <!-- Small boxes (Stat box) -->
   <div class="row">

<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-aqua">
		<div class="inner">
			<h3>{{$array_ticket['days']??'58' }} Vé</h3>
			<p>Số vé đã đặt trong ngày hôm nay</p>
		</div>
		<div class="icon">
			<i class="ion ion-bag"></i>
		</div>
		
	</div>
</div>
		<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-red">
		<div  class="inner">
		<!-- <p>Lịch trình</p> -->
		<h3>{{$array_ticket['week']??'58' }} Vé</h3>
		<p>Số vé đã đặt trong tuần này</p>
		</div>
		<div class="icon">
			<i class="ion ion-pie-graph"></i>
		</div>
	</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-green">
		<div class="inner">
			<h3>{{($array_ticket['month']??'' )}} Vé</h3>
			<p>Số vé đã đặt trong tháng này</p>
		</div>
		<div class="icon">
			<i class="ion ion-stats-bars"></i>
		</div>
	</div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
	<!-- small box -->
	<div class="small-box bg-yellow">
		<div class="inner">
			<h3>{{$array_ticket['year']??'58' }} Vé</h3>
			<p >Số vé đã đặt trong năm</p>
		</div>
		<div class="icon">
		</div>
	</div>
</div>
</div>
<br><br><br><br>
<!DOCTYPE HTML>
<html>
<head>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2", //\ "light1", "light2", "dark1", "dark2"
            title: {
                text: "BIỂU ĐỒ THỐNG KÊ SỐ VÉ BÁN ĐƯỢC NĂM {{$order_ticket['nam']??''}} THEO THÁNG"
            },
            axisY: {
                title: "Số vé"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "Số vé",
                dataPoints: [{
                        y: {{$order_ticket['thang1']??'0'}},
                        label: "Tháng 1"
                    },
                    {
                        y: {{$order_ticket['thang2']??'0'}},
                        label: "Tháng 2"
                    },
                    {
                        y: {{$order_ticket['thang3']??'0'}},
                        label: "Tháng 3"
                    },
                    {
                        y: {{$order_ticket['thang4']??'0'}},
                        label: "Tháng 4"
                    },
                    {
                        y: {{$order_ticket['thang5']??'0'}},
                        label: "Tháng 5"
                    },
                    {
                        y: {{$order_ticket['thang6']??'0'}},
                        label: "Tháng 6"
                    },
                    {
                        y: {{$order_ticket['thang7']??'0'}},
                        label: "Tháng 7"
                    },
                    {
                        y: {{$order_ticket['thang8']??'0'}},
                        label: "Tháng 8"
                    },
                    {
                        y: {{$order_ticket['thang9']??'0'}},
                        label: "Tháng 9"
                    },
                    {
                        y: {{$order_ticket['thang10']??'0'}}0,
                        label: "Tháng 10"
                    },
                    {
                        y: {{$order_ticket['thang11']??'0'}},
                        label: "Tháng 11"
                    },
                    {
                        y: {{$order_ticket['thang12']??'0'}},
                        label: "Tháng 12"
                    }
                ]
            }]
        });
        chart.render();
    }
</script>
</head>
<body>
<div id="chartContainer" style="height: 350px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
@endsection