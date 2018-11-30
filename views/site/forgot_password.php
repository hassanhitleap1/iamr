<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = Yii::t('app', 'Forgot_Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
     <div class="row">
        <div class="col-md-7 col-md-offset-3">
             <div class="panel panel-default">
                <div class="panel-heading"><?= Yii::t('app', 'Forgot_Password') ?></div>
                <div class="panel-body">
                    <div class="row">
                        <?php if(Yii::$app->session->has('send_email')):?>
                            <div class="alert alert-success">
                                <?= Yii::t('app','Send_Sucessfully')?>
                                <?php Yii::$app->session->remove('send_email'); ?>
                            </div>
                        <?php else:?>
                             <div class="col-md-12">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'forget-form',
                                ]); ?>

                                  <?= $form->field($model, 'email')->textInput([
                                        'autofocus' => true,
                                        'placeholder' => Yii::t('app', 'Email')
                                    ])->label(false) ?>

                                  <div class="form-group">
                                      <div class="col-md-4">
                                          <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary btn-block', 'name' => 'forget-button']) ?>
                                      </div>
                                  </div>
                              <?php ActiveForm::end(); ?>
                        </div>
                        <?php endif;?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
