<?php
use  yii\helpers\Url; 
use yii\widgets\LinkPager;
use yii\bootstrap\Html;
/* @var $this yii\web\View */
$this->title = 'You are a rich';
?>
<style>

 .list-unstyled li {
    padding: 10px;
    color: #6c757d;
}
.panel-standerd{
    background-color: #20b23e !important;
   
}
.panel-golden{
    background-color: #FFD700 !important;
   
}
.panel-premium{
    background-color: #008bfd !important;
   
}
.panel-heading{
 text-align: center;
}
.list-unstyled{
font-size: 16px;
}

.list-unstyled li {
    color: black !important;
}
</style>
<div class="site-index">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="<?= Yii::$app->request->baseUrl . '/img-site/slider/1.jpg' ?>" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="<?= Yii::$app->request->baseUrl . '/img-site/slider/2.jpg' ?>" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="<?= Yii::$app->request->baseUrl . '/img-site/slider/3.jpg' ?>" alt="New york" style="width:100%;">
      </div>
       <div class="item">
        <img src="<?= Yii::$app->request->baseUrl . '/img-site/slider/4.jpg' ?>" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="row" style="margin-top: 24px;">
     <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading panel-standerd">
                    <h2 ><?= Yii::t('app', 'Standerd') ?> </h2>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                            <hr>
                            <li>10% <?= Yii::t('app', 'per_buy_users_membaership') ?>  </li>
                            <hr>
                            <li><?= Yii::t('app', 'price:{0}',20)?> </li>
                            <hr>
                            <li>100 <?= Yii::t('app', 'direct_referral') ?> </li>
                            <hr>
                            <li><?=\Yii::t('app', 'pay_every:{0}', 10); ?></li>
                            <hr>
                    </ul>
                    <?= Html::a('Order now', ['site/payment', 'id' => 1], ['class' => 'btn btn-primary center-block', "target" => "_blank"]) ?>
                </div>
            </div>
    </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading panel-golden">
                    <h2 class=><?= Yii::t('app', 'Golden') ?></h2>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                            <hr>
                            <li>20% <?= Yii::t('app', 'per_buy_users_membaership') ?></li>
                            <hr>
                            <li><?= Yii::t('app', 'price:{0}',50)?> </li>
                            <hr>
                            <li><?= Yii::t('app', 'unlimited_direct_referral') ?></li>
                            <hr>
                            <li><?=\Yii::t('app', 'pay_every:{0}', 5); ?></li>
                            <hr>

                    </ul>
                    <?= Html::a('Order now', ['site/payment', 'id' => 2], ['class' => 'btn btn-primary center-block', "target" => "_blank"]) ?>
                </div>
            </div>
    </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading panel-premium">
                    <h2 class=><?= Yii::t('app', 'Premium') ?></h2>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                            <hr>    
                            <li>50% <?= Yii::t('app', 'per_buy_users_membaership') ?></li>
                            <hr>
                            <li><?= Yii::t('app', 'price:{0}',100)?> </li>
                            <hr>
                            <li><?= Yii::t('app', 'unlimited_direct_referral') ?> </li>
                            <hr>
                            <li><?=\Yii::t('app', 'pay_every:{0}', 1); ?></li>
                            <hr>

                    </ul>
                    <?= Html::a('Order now', ['site/payment', 'id' => 3], ['class' => 'btn btn-primary center-block', "target" => "_blank"]) ?>
                </div>
            </div>
    </div>
</div>
</div>
