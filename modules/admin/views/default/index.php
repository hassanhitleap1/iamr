<?php
use  yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'Admin';
?>
<div class="admin-default-index">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class=" col-md-7  col-md-offset-4 centered user-info">namber user active is 
      <span class="glyphicon glyphicon-user"></span><strong >
        <?= !empty($avtiveCountUser)? $avtiveCountUser : 0;   ?></strong >
    </div>
    <hr>
    <canvas id="pie-chart" width="1000" height="200"></canvas>
    <br/><br/><br/>
    <div class=" col-md-7  col-md-offset-4 centered user-info">namber user Disactive is 
      <span class="glyphicon glyphicon-user"></span><strong >
        <?= !empty($disAvtiveCountUser)? $disAvtiveCountUser : 0; ?></strong >
    </div>
    <hr>
     <?php 

     $arrayCountryCode = [];
     $arrayCountryCount= [];
      if (!empty($topContry))
      {
       foreach ($topContry as $value) {
          $arrayCountryCode[]= '"'.$value['country_code'] .'"';
          $arrayCountryCount[]=$value['country_count'];
       }
      }
 ?>

<canvas id="pie2-chart" width="1000" height="200"></canvas>

<script>
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: [<?= implode(',', $arrayCountryCode );?>],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [<?= implode(', ', $arrayCountryCount)?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Active user form country'
      }
    }
});
new Chart(document.getElementById("pie2-chart"), {
    type: 'pie',
    data: {
      labels: [<?= implode(',', $arrayCountryCode );?>],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [<?= implode(', ', $arrayCountryCount)?>]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'DisActive user form country'
      }
    }
});


</script>
</div>
 

