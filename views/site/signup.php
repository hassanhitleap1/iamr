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
                        <h3><?= Yii::t('app','signup');?></h3>
                    </div>
                      <div class="panel-body">
                           <div class="row">
                               <div class="col-md-4">
                                    <?php
                                    //  \powerkernel\bootstrapsocial\Button::widget([
                                    // 'button' => 'twitter', 
                                    // 'iconOnly' => false, // set true if only want the icon 
                                    // 'link' => '#your-url', // the button URL
                                    // 'label'=> Yii::t('app','singup_with_twitter'), // button 
                                    // 'class'=>'btn-lg',
                                    // ]) 
                                    ?>   
                  
                               </div>
                               <div class="col-md-4">
                                    <?php
                                    // \powerkernel\bootstrapsocial\Button::widget([
                                    // 'button' => 'facebook', 
                                    // 'iconOnly' => false, // set true if only want the icon 
                                    // 'link' => '#your-url', // the button URL
                                    // 'label'=> Yii::t('app','singup_with_facebook'), // button label
                                    // 'class'=>'btn-lg',
                                    // ]) 
                                    ?>                   
                               </div>
                               <div class="col-md-4">
                                    <?php 
                                    // \powerkernel\bootstrapsocial\Button::widget([
                                    // 'button' => 'google', 
                                    // 'iconOnly' => false, // set true if only want the icon 
                                    // 'link' => '#your-url', // the button URL
                                    // 'label'=> Yii::t('app','singup_with_google'), // button label
                                    // 'class'=>'btn-lg',
                                    // ])
                                     ?>                   
                               </div>
                           </div>
                           <hr>
                               <div class="contanier">
                                    <?php $form = ActiveForm::begin(['id' => 'form-signup','options'=>['enctype'=>'multipart/form-data'] ]); ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                 <?= $form->field($model, 'full_name')->textInput(['autofocus' => true,
                                                        'placeholder'=>Yii::t('app','Full_Name')])->label(false) ?>
                                                 <?= $form->field($model, 'email')->textInput(['autofocus' => true,
                                                        'placeholder'=>Yii::t('app','Email')])->label(false) ?>                               
                                            </div>
                                            <div class="col-md-6">
                                                 <?= $form->field($model, 'password')->passwordInput([
                                                        'placeholder'=>Yii::t('app','Password_Hash')])->label(false)  ?>

                                                 <?= $form->field($model, 'confirm_password')->passwordInput([
                                                        'placeholder'=>Yii::t('app','confirm_password')])->label(false) ?>      
                                            </div>
                                         </div>   
                                              <?= $form->field($model, 'about_me')->textArea(['rows' => '6','cols'=>50,
                                                'placeholder'=>Yii::t('app','About_Me')])->label(false)  ;?>
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
                                                <?= Html::submitButton(Yii::t('app','button_singup'), ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                                            </div>
                                            
                                        </div>
                                        <?php ActiveForm::end(); ?>
                                </div>
                      </div>      
            </div>
        </div>
    </div>
</div>