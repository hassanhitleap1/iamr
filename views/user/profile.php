<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">
    <div class="row">
    <p>
        <?= Html::a('Update profile', ['edit'], ['class' => 'btn btn-success pull-right']) ?>
    </p>
                    <div class="col-sm-6 col-md-4">
                        <img src="<?= Yii::$app->request->baseUrl.'/'.$user->image_name?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?= $user->full_name ?></h4>
                        <small><cite title=<?= ($user->infoDevice !== null) ? $user->infoDevice->country . ' ' . $user->infoDevice->region_name : Yii::t('app', 'the_address_is_unknown') ?> ><?= ($user->infoDevice !== null) ? $user->infoDevice->country . ' ' . $user->infoDevice->region_name : Yii::t('app', 'the_address_is_unknown') ?> <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?=$user->email?> 
   
                        <!-- Split button -->
                        <div class="btn-group">
                           
                            <p>
                                <?= $user->about_me ?>
                   
                        </div>
                    </div>
                </div>
</div>
