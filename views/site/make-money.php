<?php
use yii\helpers\Url; 
/* @var $this yii\web\View */
$this->title =  Yii::t('app','make-money');
?>
<div class="site-make-money">

    <div class="container">
        <div class="row" style="margin-top:65px">

            <div class="row">
                <h1 class="title"><?= $model['title_' . Yii::$app->language] ?></h1>
            </div>
            <div class="row">
                <hr>
                <div class="col-md-7  col-md-offset-2">
                    <img src=<?= Yii::$app->request->baseUrl . '/image/page/make-maony.jpg' ?> alt="" class="img-blog img-rounded">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-2" style="margin-top: 41px;">
                           <?= $model['description_' . Yii::$app->language] ?>
                    </div>
                </div>

            </div>
       
        </div>
    </div>

</div>