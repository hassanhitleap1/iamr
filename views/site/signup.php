<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup','options'=>['enctype'=>'multipart/form-data'] ]); ?>

                <?= $form->field($model, 'full_name') ?>

                <?= $form->field($model, 'about_me')->textArea(['rows' => '6','cols'=>50]) ;?>

                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'confirm_password')->passwordInput() ?>

                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => ['multiple' => false, 'accept' => 'image/*'],
                        'pluginOptions' => [
                            'previewFileType' => 'image',
                            'showUpload' => false,
                            'allowedFileExtensions' => ['jpg','png','jpeg'],
                            ]
                    ]);?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>