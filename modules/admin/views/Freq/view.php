<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Freq */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freq-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_html',
            'prg_en',
            'prg_de',
            'prg_it',
            'prg_ar',
            'prg_fr',
            'collapse_en:ntext',
            'collapse_it:ntext',
            'collapse_de:ntext',
            'collapse_fr:ntext',
            'collapse_ar:ntext',
        ],
    ]) ?>

</div>
