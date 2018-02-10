<?php
/* @var $this yii\web\View */

$this->title = 'Payment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-payment">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                        <div class="checkbox pull-right">
                            <label>
                                <input type="checkbox" />
                                Remember
                            </label>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                        <div class="form-group">
                            <label for="cardNumber">
                                CARD NUMBER</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                    required autofocus />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label for="expityMonth">
                                        EXPIRY DATE</label>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control" id="expityMonth" placeholder="MM" required />
                                    </div>
                                    <div class="col-xs-6 col-lg-6 pl-ziro">
                                        <input type="text" class="form-control" id="expityYear" placeholder="YY" required /></div>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label for="cvCode">
                                        CV CODE</label>
                                    <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
        </div>
        <div class="col-xs-12 col-md-4" >
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Payment Details
                        </h3>
                       
                    </div>
                    <div class="panel-body">
                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">

                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business"
                                value="donations@kcparkfriends.org">
                        
                            <!-- Specify a Donate button. -->
                            <input type="hidden" name="cmd" value="_donations">
                        
                            <!-- Specify details about the contribution -->
                            <input type="hidden" name="item_name" value="Friends of the Park">
                            <input type="hidden" name="item_number" value="Fall Cleanup Campaign">
                            <input type="hidden" name="currency_code" value="USD">
                        
                            <!-- Display the payment button. -->
                            <input type="image" name="submit"
                            src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
                            alt="Donate">
                            <img alt="" width="1" height="1"
                            src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                        
                        </form>
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
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span>4200</span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <a href="http://www.jquery2dotnet.com" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>   

        
        
</div>    