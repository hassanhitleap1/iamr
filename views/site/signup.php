<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\web\UploadedFile;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
     <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default ">
                    <div class="panel-heading">
                        signup
                    </div>
                      <div class="panel-body">
                           <div class="row">
                               <div class="col-md-4">
                                    <?= \powerkernel\bootstrapsocial\Button::widget([
                                    'button' => 'twitter', 
                                    'iconOnly' => false, // set true if only want the icon 
                                    'link' => '#your-url', // the button URL
                                    'label'=> 'log in with twitter', // button label
                                    'class'=>'btn-lg',
                                    ]) ?>                   
                               </div>
                               <div class="col-md-4">
                                    <?= \powerkernel\bootstrapsocial\Button::widget([
                                    'button' => 'facebook', 
                                    'iconOnly' => false, // set true if only want the icon 
                                    'link' => '#your-url', // the button URL
                                    'label'=> 'log in with facebook', // button label
                                    'class'=>'btn-lg',
                                    ]) ?>                   
                               </div>
                               <div class="col-md-4">
                                    <?= \powerkernel\bootstrapsocial\Button::widget([
                                    'button' => 'google', 
                                    'iconOnly' => false, // set true if only want the icon 
                                    'link' => '#your-url', // the button URL
                                    'label'=> 'log in with google', // button label
                                    'class'=>'btn-lg',
                                    ]) ?>                   
                               </div>
                           </div>
                           <hr>
                               <div class="contanier">
                                    <?php $form = ActiveForm::begin(['id' => 'form-signup','options'=>['enctype'=>'multipart/form-data'] ]); ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <?= $form->field($model, 'full_name')->textInput(['autofocus' => true,
                                                        'placeholder'=>'full Name'])->label(false) ?>
                                                 <?= $form->field($model, 'email')->textInput(['autofocus' => true,
                                                        'placeholder'=>'email'])->label(false) ?>                               
                                            </div>
                                            <div class="col-md-6">
                                                 <?= $form->field($model, 'password')->passwordInput([
                                                        'placeholder'=>'password'])->label(false)  ?>

                                                 <?= $form->field($model, 'confirm_password')->passwordInput([
                                                        'placeholder'=>'confirm password'])->label(false) ?>      
                                            </div>
                                         </div>   
                                              <?= $form->field($model, 'about_me')->textArea(['rows' => '6','cols'=>50,
                                                'placeholder'=>'about me'])->label(false)  ;?>
                                                <label for="file">optional</label>
                                              <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                                                    'options' => ['multiple' => false, 'accept' => 'image/*'],
                                                    'pluginOptions' => [
                                                        'previewFileType' => 'image',
                                                        'showUpload' => false,
                                                        'allowedFileExtensions' => ['jpg','png','jpeg'],
                                                        ]
                                                ])->label(false);?>

                                            <div class="form-group col-md-4">
                                                <?= Html::submitButton('Signup', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                                            </div>
                                            
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                </div>
                      </div>      
            </div>
        </div>
    </div>
</div>