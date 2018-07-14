<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Memberships */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memberships-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_it')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'features_en')->textInput() ?>

    <?= $form->field($model, 'features_ar')->textInput() ?>

    <?= $form->field($model, 'features_de')->textInput() ?>

    <?= $form->field($model, 'features_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'features_it')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
