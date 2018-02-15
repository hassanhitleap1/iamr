<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Profile';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">
    
    <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="<?= Yii::$app->request->baseUrl.'/'.$user->image_name?>" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4><?= $user->full_name ?></h4>
                        <small><cite title="San Francisco, USA"><?=  "San Francisco, USA" ?> <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i><?=$user->email?> 
                            <br />
                            <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com"><?=  "www.jquery2dotnet.com" ?></a>
                            <br />
                            <i class="glyphicon glyphicon-gift"></i><?= "June 02, 1988" ?> </p>
                        <!-- Split button -->
                        <div class="btn-group">
                           
                            <p>
                                <?= $user->about_me ?>
                   
                        </div>
                    </div>
                </div>
</div>
