<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'description_en')->widget(CKEditor::className(), [
                    'options' => ['rows' => 6],
                    'preset' => 'full',
                        'clientOptions' => [
                                'filebrowserUploadUrl' => yii\helpers\Url::to(['page/uploadfile'])
                            ]
                ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_de')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'description_de')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full',
                    'clientOptions' => [
                            'filebrowserUploadUrl' => yii\helpers\Url::to(['page/uploadfile'])
                        ]
            ]) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'title_fr')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'description_fr')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full',
                    'clientOptions' => [
                            'filebrowserUploadUrl' => yii\helpers\Url::to(['page/uploadfile'])
                        ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'title_it')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'description_it')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full',
                    'clientOptions' => [
                            'filebrowserUploadUrl' => yii\helpers\Url::to(['page/uploadfile'])
                        ]
            ]) ?>
        </div>
        <div class="col-md-4">
             <?= $form->field($model, 'title_ar')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
        <?= $form->field($model, 'description_ar')->widget(CKEditor::className(), [
                'options' => ['rows' => 6],
                'preset' => 'full',
                    'clientOptions' => [
                            'filebrowserUploadUrl' => yii\helpers\Url::to(['page/uploadfile'])
                        ]
            ]) ?>
        </div>
    </div>
    <?= $form->field($model, 'key_page')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
