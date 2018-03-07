<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FreqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_html') ?>

    <?= $form->field($model, 'prg_en') ?>

    <?= $form->field($model, 'prg_de') ?>

    <?= $form->field($model, 'prg_it') ?>

    <?php // echo $form->field($model, 'prg_ar') ?>

    <?php // echo $form->field($model, 'prg_fr') ?>

    <?php // echo $form->field($model, 'collapse_en') ?>

    <?php // echo $form->field($model, 'collapse_it') ?>

    <?php // echo $form->field($model, 'collapse_de') ?>

    <?php // echo $form->field($model, 'collapse_fr') ?>

    <?php // echo $form->field($model, 'collapse_ar') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
