<?php

use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Payment');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-payment">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="radio pull-right">
                      <label><input type="radio" name="optradio" disabled ><?= Yii::t('app', 'This_Payment') ?> </label>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                             <?= Yii::t('app', 'Payment_Details') ?> 
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                        <div class="form-group">
                            <label for="cardNumber">
                                <?= Yii::t('app', 'CARD_NUMBER') ?>  </label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                    required autofocus disabled />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="expityMonth">
                                      <?= Yii::t('app', 'EXPIRY_DATE') ?> </label>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control" id="expityMonth" placeholder="MM" required  disabled/>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control" id="expityYear" placeholder="YY" required  disabled/></div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cvCode">
                                        CV CODE</label>
                                    <input type="password" class="form-control" id="cvCode" placeholder="CV" required  disabled/>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-xs-12 col-md-4" >
            <div class="panel panel-default">
                    <div class="radio pull-right">
                      <label><input type="radio" name="optradio" checked> <?= Yii::t('app', 'This_Payment') ?> </label>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <?= Yii::t('app', 'Payment_Details') ?>
                        </h3>
                       
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <div> <img  class="img-card" src="http://www.fabawards.com/wp-content/uploads/paypal-and-credit-cards1.gif" alt="PayPal Cards" style=" margin-top:0px;" > </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        <div class="col-xs-12 col-md-8 col-md-offset-2">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><?= $membership->price ?></span><?= Yii::t('app', 'Total_Donation')?></a>
                </li>
            </ul>
            <br/>
            <?= Html::a(Yii::t('app','Pay'), ['/payment', 'id' => $membership->id], ['class' => 'btn btn-success btn-lg btn-block', "role" => "button"]) ?>
        </div>   
</div>    