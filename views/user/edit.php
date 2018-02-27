<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\web\UploadedFile;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>
    
     <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'about_me')->textArea(['rows' => '6', 'cols' => 50,
        'placeholder' => Yii::t('app', 'About_Me')])->label(false); ?>
      <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['multiple' => false, 'accept' => 'image/*'],
            'pluginOptions' => ['previewFileType' => 'image',
                            'showUpload' => false,
                            'allowedFileExtensions' => ['jpg', 'png', 'jpeg'],]])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
