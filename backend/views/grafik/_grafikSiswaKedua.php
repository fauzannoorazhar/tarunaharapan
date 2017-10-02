<?php 
  use common\models\Siswa; 

$date = date('Y');
//Satu Tahun Kebelakang & Dua Tahun Kebelakang
$OneAgo = strtotime($date.' - 1 year');
$OneYearAgo = date('Y', $OneAgo);
?>
<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-siswa-kedua",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Jumlah Siswa Tahun <?= $OneYearAgo ?>",
              "xAxisName": "Siswa",
              "yAxisName": "Jumlah Siswa",
              "theme": "fint"
           },
          "data":        
              [ <?= Siswa::getGrafikSiswaKedua($OneYearAgo); ?> ]
        }
    });
    revenueChart.render();
})
    
</script> 
<div id="grafik-siswa-kedua"> FusionChart XT will load here! </div>