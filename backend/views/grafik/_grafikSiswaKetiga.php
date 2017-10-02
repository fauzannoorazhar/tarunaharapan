<?php 
  use common\models\Siswa; 

$date = date('Y');
//Satu Tahun Kebelakang & Dua Tahun Kebelakang
$TwoAgo = strtotime($date.' - 2 year');
$TwoYearAgo = date('Y', $TwoAgo);
?>
<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-siswa-ketiga",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Jumlah Siswa Tahun <?= $TwoYearAgo ?>",
              "xAxisName": "Siswa",
              "yAxisName": "Jumlah Siswa",
              "theme": "fint"
           },
          "data":        
              [ <?= Siswa::getGrafikSiswaKetiga($TwoYearAgo); ?> ]
        }
    });
    revenueChart.render();
})
    
</script> 
<div id="grafik-siswa-ketiga"> FusionChart XT will load here! </div>