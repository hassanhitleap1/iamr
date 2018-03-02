<?php
// use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentRequest */
/* @var $form yii\widgets\ActiveForm */
$this->title="payment-request";
?>

<div class="payment-request-form">
        <?php if(Yii::$app->session->has('record')): ?>
        <div class="alert alert-success">
        <strong>Info</strong><?=Yii::$app->session->get('record');?>
        </div>
        <?php  endif ; ?>
         <?php if (!Yii::$app->session->has('record')): ?>
       
     
        <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default ">
                    <div class="panel-heading">
                        Payment Request
                    </div>
                      <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-4 col-md-8 col-md-offset-2">
                                <label class="radio-inline"><input type="radio" name="optradio"  value="paypal" id="paypal" checked > paypal </label>
                                <label class="radio-inline"><input type="radio" name="optradio" value="western-union" id="western-union" >western union </label>
                            </div>
                        </div>
                            <?php $form = ActiveForm::begin(); ?>

                            <?= $form->field($model, 'value')->textInput(['placeholder'=>'1.00']) ?>
                             <hr> 
                            <!-- <p class="message-payment-form"> if you wont paypal please just fill paypal filed</p>   -->
                            <?= $form->field($model, 'paypal')->textInput(['id' => 'input-paypal','maxlength' => true]) ?>
                            <hr>
                            <!-- <p class="message-payment-form"> if you wont Western Union  please just fill  </p>  -->
                            <?= $form->field($model, 'western_union_full_name')->textInput(['id' => 'input-western-union','maxlength' => true ]) ?>

                            <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>
                            
                            <?= $form->field($model, 'full_address')->textInput(['maxlength' => true, 'placeholder'=>Yii::t('app', 'address_like')]) ?>

                            <div class="form-group">
                                <?= Html::submitButton( Yii::t('app','Request') , ['class' =>  'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>
                      </div>      
            </div>
        </div>
    </div>
 <?php endif; ?> 

</div>
<?php
$script = <<< JS
$(document).ready(function(){
    
    $( "#input-paypal" ).prop( "disabled", false );
    $( "#input-western-union" ).prop( "disabled", true );
    $('[name=optradio]').click(function(){
       if ($('#paypal').is(":checked"))
        {
            $( "#input-paypal" ).prop( "disabled", false );
            $( "#input-western-union" ).prop( "disabled", true );
        }
        if ($('#western-union').is(":checked"))
        {
            $( "#input-paypal" ).prop( "disabled", true );
            $( "#input-western-union" ).prop( "disabled", false );
        }
      

    });
 
}); 
JS;
$this->registerJs($script, View::POS_END);
?>
