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

    <?php $form = ActiveForm::begin(['id' => 'form-edit','options'=>['enctype'=>'multipart/form-data'] ]); ?>
    
     <?= $form->field($model, 'full_name')->textInput(['maxlength' => true,
     'placeholder' => Yii::t('app', 'Full_Name'),'value'=>$user->full_name])->label(false);?>

    <?= $form->field($model, 'about_me')->textArea([
        'value' => $model->full_name,
        'rows' => '6', 'cols' => 50,
        'placeholder' => Yii::t('app', 'About_Me'),'value'=>$user->about_me])->label(false); ?>

      <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['multiple' => false, 'accept' => 'image/*'],
            'pluginOptions' => [
                       'initialPreview'=>[
                        Html::img($user->image_name),
                ],
                'previewFileType' => 'image',
                'showUpload' => false,
                'allowedFileExtensions' => ['jpg', 'png', 'jpeg'],]])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' =>   'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
