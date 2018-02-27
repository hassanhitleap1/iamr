<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\admin\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'title_de') ?>

    <?= $form->field($model, 'title_fr') ?>

    <?= $form->field($model, 'title_it') ?>

    <?php // echo $form->field($model, 'title_ar') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'description_de') ?>

    <?php // echo $form->field($model, 'description_fr') ?>

    <?php // echo $form->field($model, 'description_it') ?>

    <?php // echo $form->field($model, 'description_ar') ?>

    <?php // echo $form->field($model, 'key_page') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
