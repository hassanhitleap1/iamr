<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Freq */

$this->title = Yii::t('app', 'Create Freq');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Freqs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freq-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
