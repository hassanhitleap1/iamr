<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'membership
';
$this->params['breadcrumbs'][] = $this->title;
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
<div class="row">
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
                            <li>price 20$ doller</li>
                            <hr>
                            <li>100 <?= Yii::t('app', 'direct_referral') ?> </li>
                            <hr>
                            <li><?= Yii::t('app', 'pay_every_10_days') ?></li>
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
                            <li>10% <?= Yii::t('app', 'per_buy_users_membaership') ?></li>
                            <hr>
                            <li>price 50$ doller</li>
                            <hr>
                            <li>100 <?= Yii::t('app', 'direct_referral') ?></li>
                            <hr>
                            <li><?= Yii::t('app', 'pay_every_10_days') ?> </li>
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
                            <li>10% <?= Yii::t('app', 'per_buy_users_membaership') ?></li>
                            <hr>
                            <li>price 100$ doller</li>
                            <hr>
                            <li>100 <?= Yii::t('app', 'direct_referral') ?> </li>
                            <hr>
                            <li> <?= Yii::t('app', 'pay_every_10_days') ?> </li>
                            <hr>

                    </ul>
                    <?= Html::a('Order now', ['site/payment', 'id' => 3], ['class' => 'btn btn-primary center-block', "target" => "_blank"]) ?>
                </div>
            </div>
    </div>
</div>
