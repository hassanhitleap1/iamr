<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = Yii::t('app', 'New_Password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
     <div class="row">
        <div class="col-md-7 col-md-offset-3">
             <div class="panel panel-default">
                <div class="panel-heading"><?= Yii::t('app', 'New_Password') ?></div>
                <div class="panel-body">
                    <div class="row">
                    
                        <?php if (!Yii::$app->session->has('validate_code')) : ?>
                            <div class="alert alert-danger">
                                <?= Yii::t('app', 'expired_token') ?>
                            </div>
                         <?php elseif (Yii::$app->session->has('error_code')) : ?>
                            <div class="alert alert-danger">
                                <?= Yii::t('app', 'Error_Token') ?>
                                <?php Yii::$app->session->remove('error_code'); ?>
                            </div>
                            <?php elseif (Yii::$app->session->has('create_password')) : ?>
                            <div class="alert alert-success">
                                <?= Html::a(Yii::t('app', 'Successfully_Change_Password'), ['/site/login'], ['class' => '']) ?>
                                <?php Yii::$app->session->destroy(); ?>
                            </div>
                    
                        <?php else : ?>
                                <div class="col-md-12">
                                <?php $form = ActiveForm::begin([
                                    'id' => 'new-password',
                                ]); ?>

                                  <?= $form->field($model, 'password')->passwordInput([
                                        'autofocus' => true,
                                        'placeholder' => Yii::t('app', 'password')
                                    ])->label(false) ?>
                                    <?= $form->field($model, 'confPassword')->passwordInput([
                                        'autofocus' => true,
                                        'placeholder' => Yii::t('app', 'confPassword')
                                    ])->label(false) ?>

                                  <div class="form-group">
                                      <div class="col-md-4">
                                          <?= Html::submitButton(Yii::t('app', 'Create'), ['class' => 'btn btn-primary btn-block', 'name' => 'new-password-button']) ?>
                                      </div>
                                  </div>

                              <?php ActiveForm::end(); ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
