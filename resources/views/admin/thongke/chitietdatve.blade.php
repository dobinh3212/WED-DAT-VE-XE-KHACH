@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Thống kê
        <small>Bảng điều khiển</small>
    </h1>
</section>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Biểu đồ số vé bán được trong năm : 2022"
	},
	axisX:{
		valueFormatString: "DD MMM",
		crosshair: {
			enabled: true,
			snapToDataPoint: true
		}
	},
	axisY: {
		title: "Số vé bán được",
		includeZero: true,
		crosshair: {
			enabled: true
		}
	},
	toolTip:{
		shared:true
	},  
	legend:{
		cursor:"pointer",
		verticalAlign: "bottom",
		horizontalAlign: "left",
		dockInsidePlotArea: true,
		itemclick: toogleDataSeries
	},
	data: [
	{
		type: "line",
		showInLegend: true,
		name: "vé",
		lineDashType: "dash",
		dataPoints: [
			{ x: new Date(2022, 01), y: 510 },
			{ x: new Date(2022, 02), y: 560 },
			{ x: new Date(2022, 03), y: 540 },
			{ x: new Date(2022, 04), y: 558 },
			{ x: new Date(2022, 05), y: 544 },
			{ x: new Date(2022, 06), y: 693 },
			{ x: new Date(2022, 07), y: 657 },
			{ x: new Date(2022, 08), y: 663 },
			{ x: new Date(2022, 09), y: 639 },
			{ x: new Date(2022, 10), y: 673 },
            { x: new Date(2022, 11), y: 639 },
            { x: new Date(2022, 12), y: 639 },

		]
	}]
});
chart.render();

function toogleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
@endsection