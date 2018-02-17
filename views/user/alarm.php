<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'alram';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-user">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-info">
    <strong>Info!</strong>  <a href=<?= \yii\helpers\Url::to(['site/payment']);?> >to get referral must be pay (donation) to the site and show your information for the world  </a>
    </div>

</div>