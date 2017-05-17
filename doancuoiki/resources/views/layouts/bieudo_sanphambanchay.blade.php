
<div id="container1" style="min-width: 310px; height: 400px; max-width: 600px;">



        <script type="text/javascript">

Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: '<p style="font-weight:bold;">THỐNG KÊ SẢN PHẨM BÁN CHẠY NHẤT TRONG QUÝ 1</p>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: '{{$name_sp[0]}}',
            y: {{$arvg[0]}}
        }, {
            name: '{{$name_sp[1]}}',
            y: {{$arvg[1]}}
        }, {
            name: '{{$name_sp[2]}}',
            y: {{$arvg[2]}}
        }, {
            name: '{{$name_sp[3]}}',
            y: {{$arvg[3]}}
        }, {
            name: '{{$name_sp[4]}}',
            y: {{$arvg[4]}}
        }]
    }]
});
        </script>
</div>