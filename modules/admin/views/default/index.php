<?php
use  yii\helpers\Url; 
use yii\widgets\LinkPager;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
$this->title = 'Admin';
?>
<div class="admin-default-index">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <div class=" col-md-7  col-md-offset-4 centered user-info">namber user active is 
      <span class="glyphicon glyphicon-user"></span><strong >100</strong >
    </div>
    <hr>
    <canvas id="pie-chart" width="1000" height="200"></canvas>
    <br/><br/><br/>
    <div class=" col-md-7  col-md-offset-4 centered user-info">namber user Disactive is 
      <span class="glyphicon glyphicon-user"></span><strong >100</strong >
    </div>
    <hr>
<canvas id="pie2-chart" width="1000" height="200"></canvas>
<script>

new Chart(document.getElementById("pie2-chart"), {
    type: 'pie',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
new Chart(document.getElementById("pie-chart"), {
    type: 'pie',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [{
        label: "Population (millions)",
        backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
        data: [2478,5267,734,784,433]
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>
</div>
