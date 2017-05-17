 <div id="container2" style="min-width: 100px; height: 400px; margin: 0 auto">
<script type="text/javascript">
    function thang1(){
        return {{$thang[1]}};
    }
     function thang1(){
        return {{$thang[1]}};
    }
     function thang2(){
        return {{$thang[2]}};
    }
     function thang3(){
        return {{$thang[3]}};
    }
     function thang4(){
        return {{$thang[4]}};
    }
     function thang5(){
        return {{$thang[5]}};
    }
     function thang6(){
        return {{$thang[6]}};
    }
     function thang7(){
        return {{$thang[7]}};
    }
     function thang8(){
        return {{$thang[8]}};
    }
     function thang9(){
        return {{$thang[9]}};
    }
     function thang10(){
        return {{$thang[1]}};
    }
     function thang11(){
        return {{$thang[11]}};
    }
     function thang12(){
        return {{$thang[12]}};
    }
</script>
        <script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: '<p style="font-weight:bold;">Thống kê doanh số từng sản phẩm trong năm</p>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Đơn vị tính (triệu đồng)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Năm 2017: <b>{point.y:.1f} triệu đồng</b>'
    },
    series: [{
        name: 'Population',
        data: [
            ['Tháng 1', thang1()],
            ['Tháng 2', thang2()],
            ['Tháng 3', thang3()],
            ['Tháng 4', thang4()],
            ['Tháng 5', thang5()],
            ['Tháng 6', thang6()],
            ['Tháng 7 ',thang7()],
            ['Tháng 8', thang8()],
            ['Tháng 9', thang9()],
            ['Tháng 10',thang10()],
            ['Tháng 11', thang11()],
            ['Tháng 12', thang12()]
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
        </script>














</div>