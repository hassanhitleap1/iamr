<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = Yii::t('app', 'login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
     <div class="row">
        <div class="col-md-7 col-md-offset-3">
             <div class="panel panel-default">
                <div class="panel-heading"><?=Yii::t('app','Plaase-Signin')?></div>
                <div class="panel-body">
                    <div class="row">
                        <!-- <div class="col-md-4">
                          <?php 
                        //   \powerkernel\bootstrapsocial\Button::widget([
                        //   'button' => 'twitter', 
                        //   'iconOnly' => false, // set true if only want the icon 
                        //   'link' => '#your-url', // the button URL
                        //   'label'=> Yii::t('app','log_in_with_twitter'), // button label
                        //   'class'=>'btn-lg',
                        //   ]) 
                          ?>
                          <?php
                        //    \powerkernel\bootstrapsocial\Button::widget([
                        //   'button' => 'facebook', // Available buttons see https://github.com/lipis/bootstrap-social/
                        //   'iconOnly' => false, // set true if only want the icon 
                        //   'link' => '#your-url', // the button URL
                        //   'label'=> Yii::t('app','log_in_with_facebook'), // button label
                        //   ]) 
                          ?>
                          <?php 
                        //   \powerkernel\bootstrapsocial\Button::widget([
                        //   'button' => 'google', // Available buttons see https://github.com/lipis/bootstrap-social/
                        //   'iconOnly' => false, // set true if only want the icon 
                        //   'link' => '#your-url', // the button URL
                        //   'label'=>Yii::t('app','log_in_with_google') , // button label
                        //   ]) 
                          ?>                                        
                   
                        </div> -->
                        <!-- <div class="col-md-1 marging-line" ></div> -->
                        <div class="col-md-12">
                                <?php $form = ActiveForm::begin([
                                  'id' => 'login-form',
                              ]); ?>

                                  <?= $form->field($model, 'email')->textInput(['autofocus' => true,
                                  'placeholder'=>Yii::t('app','Email')])->label(false) ?>

                                  <?= $form->field($model, 'password')->passwordInput([
                                  'placeholder'=>Yii::t('app','Password_Hash')])->label(false) ?>

                                  <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                    <div class="form-group">
                                      <?=Html::a(Yii::t('app','Forgot_Password'), ['site/forget-password'])?>
                                    </div>
                                  <div class="form-group">
                                      <div class="col-md-4">
                                          <?= Html::submitButton(Yii::t('app', 'login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                                      </div>
                                  </div>

                              <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
