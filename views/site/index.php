<?php
    
/* @var $this yii\web\View */
$this->title = 'I AM RIACH';
?>
<div class="site-index">
    <div class="row">
    <?php if (! empty($users)):?>
        <?php foreach($users as $user):?>
        <div class="col-md-3">
            <div class="card mb-3">
                <img class="card-img-top" src=<?= Yii::$app->request->baseUrl.'/'.$user->image_name?> alt="Card image cap"  class="img-circle"  width="228" height="236"  >
                    <div class="card-block">
                        <h4 class="card-title"><?= $user->full_name?></h4>
                        <p class="card-text"><?= $user->about_me?></p><a href="#collapse" class="nav-toggle">Read More</a>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
            </div>
        </div>
        <?php endforeach;?>
    <?php endif;?>
    
    </div>  
</div>
