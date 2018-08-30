<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contact */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'complete'), ['complete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure complete?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'email:email',
            'subject',
            'body:ntext',
        ],
    ]) ?>
<style>
    .modal.and.carousel {
  position: fixed; // Needed because the carousel overrides the position property
}
</style>



<div class="container">

<ul class="nav nav-pills nav-stacked">
  <li><a href="#lightbox" data-toggle="modal">show image</a></li>
  
</ul>

<div class="modal fade and carousel slide" id="lightbox">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <ol class="carousel-indicators">
          <li data-target="#lightbox" data-slide-to="0" class="active"></li>
          <?php $i=1;?>
          <?php foreach($model->imagesContact as $image):?>
            <li data-target="#lightbox" data-slide-to="<?=$i++?>"></li>
            <?php endforeach;?>
          
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <?= Html::img('@web/' . $model->imageContact['image_path'], ['class' => ''])?>
          </div>
            <?php foreach($model->imagesContact as $image):?>
            <div class="item">
                <?= Html::img('@web/' . $image->image_path, ['class' => ''])?>
            </div>
            <?php endforeach;?>

        </div><!-- /.carousel-inner -->
        <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div><!-- /.modal-body -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!-- /.container -->
</div>
