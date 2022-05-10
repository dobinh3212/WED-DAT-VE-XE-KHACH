@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thống kê
        <small>Bảng điều khiển</small>
    </h1>
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
</head>

<body>
    <div id="chartContainer" style="height: 300px; width:60%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
@endsection