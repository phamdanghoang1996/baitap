<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">



		<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Biến động doanh số trong năm'
    },
    subtitle: {
        text: 'Highcharts.com'
    },
    xAxis: {
        categories: ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12']
    },
    yAxis: {
        title: {
            text: 'Triệu đồng'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Biến động doanh sô',
        data: [{{$doanhso_tt1[1]}}, {{$doanhso_tt1[2]}}, {{$doanhso_tt1[3]}}, {{$doanhso_tt1[4]}}, {{$doanhso_tt1[5]}}, {{$doanhso_tt1[6]}}, {{$doanhso_tt1[7]}}, {{$doanhso_tt1[8]}}, {{$doanhso_tt1[9]}},{{$doanhso_tt1[10]}}, {{$doanhso_tt1[11]}}, {{$doanhso_tt1[12]}}]
    }]
});
		</script>
</div>

