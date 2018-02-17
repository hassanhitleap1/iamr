<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Payment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-payment">
<div class="alert alert-info">
    <strong>Info!</strong> to get referral must be pay (donation) to the site and show your information for the world  
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="radio pull-right">
                      <label><input type="radio" name="optradio" disabled >this payment</label>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                        <div class="form-group">
                            <label for="cardNumber">
                                CARD NUMBER</label>
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
                                        EXPIRY DATE</label>
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
                      <label><input type="radio" name="optradio">this payment</label>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                       
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <div> <img src="http://www.fabawards.com/wp-content/uploads/paypal-and-credit-cards1.gif" alt="PayPal Cards" style=" margin-top:0px;"> </div>
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
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>300</span> total donation</a>
                </li>
            </ul>
            <br/>
            <a href="<?=Url::to(['/payment'])?>" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>   
</div>    