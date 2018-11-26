<?php
use  yii\helpers\Url; 
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'You are a rich';
?>
<div class="site-success-story">
    <div class="row">
    <?php if (! empty($users)):?>
        <?php foreach($users as $user):?>
        <div class="col-md-3">
            <div class="card mb-3">
                <img class="card-img-top" src=<?= Yii::$app->request->baseUrl.'/'.$user->image_name?> alt="Card image cap"  class="img-circle"  width="228" height="236"  >
                    <div class="card-block">
                        <h4 class="card-title"><?= $user->full_name?></h4>
                        <p class="card-text"><?=  substr($user->about_me,0,40)?></p><a
                         href=<?=Yii::$app->request->baseUrl."/index.php/?r=site/view&id=$user->id"?> class="nav-toggle"><?=Yii::t('app','Read_More')?></a>
                        <p class="card-text"><small class="text-muted"><?=date("Y-m-d", $user->created_at); ?></small></p>
                    </div>
            </div>
        </div>
        <?php endforeach;?>
    <?php endif;?>
    
    </div>  
    <div class="row">
        <?php echo LinkPager::widget([
    'pagination' => $pages,
]); ?>
    </div>
</div>
