<?php 
  use common\models\Siswa; 
?>
<script>

FusionCharts.ready(function(){
      var revenueChart = new FusionCharts({
        "type": "Column3d",
        "renderAt": "grafik-siswa",
        "width": "100%",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption" : "Grafik Jumlah Siswa Tahun <?= date('Y') ?>",
              "xAxisName": "Siswa",
              "yAxisName": "Jumlah Siswa",
              "theme": "fint"
           },
          "data":        
              [ <?= Siswa::getGrafikSiswaPertama(); ?> ]
        }
    });
    revenueChart.render();
})
		
</script> 
<div id="grafik-siswa"> FusionChart XT will load here! </div>