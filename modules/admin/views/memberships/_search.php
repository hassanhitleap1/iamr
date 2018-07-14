<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MembershipsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memberships-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'name_ar') ?>

    <?= $form->field($model, 'name_it') ?>

    <?= $form->field($model, 'name_fr') ?>

    <?php // echo $form->field($model, 'name_de') ?>

    <?php // echo $form->field($model, 'features_en') ?>

    <?php // echo $form->field($model, 'features_ar') ?>

    <?php // echo $form->field($model, 'features_de') ?>

    <?php // echo $form->field($model, 'features_fr') ?>

    <?php // echo $form->field($model, 'features_it') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
