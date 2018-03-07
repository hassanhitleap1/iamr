<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Freq */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freq-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_html')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prg_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prg_de')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prg_it')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prg_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prg_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collapse_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collapse_it')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collapse_de')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collapse_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collapse_ar')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
