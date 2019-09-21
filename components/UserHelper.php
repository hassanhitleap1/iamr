<?php

namespace  app\components;

use Yii;
use yii\base\BaseObject;
use app\models\Balance;
use app\models\Referral;
use app\models\ReferralCode;
use app\models\PaymentRequest;
use app\models\User;

class UserHelper extends BaseObject
{
	
    public  static function setBalance($userId){
        $balanceModel= new Balance;
        $balanceModel->balance=00.00;
        $balanceModel->user_id=$userId;
        $balanceModel->save();
    }

    public static function setReferral($userId,$userIdReferral){
        $referral= new Referral;
        $referral->user_id=$userId;
        $referral->user_id_referral=$userIdReferral;
        $referral->save();
    }

    public static function setCoin($coin){
        $user=User::find(Yii::$app->user->id);
        $user->coin=$coin;
        $user->save();
    }

    public static function setReferralCode($userId){
        $referralCode= new ReferralCode;
        $urlRef= Yii::$app->params['siteUrl'].'/index.php?r=site%2Fsignup&ref='.Yii::$app->user->identity->ref;
        $jsCode = "<img  onclick='openInNewTab();' 
        src='". Yii::$app->params['siteUrl'] ."/img-site/referral.jpg'  
        style='width: 466px; height: 45px;' id='link' />
        <script>
        function openInNewTab() 
        {
            var url='".$urlRef."';
            var win = window.open(url, '_blank');
            win.focus();
        }
        </script>";
        $htmlCode= $urlRef;
        $referralCode->html_code=$htmlCode;
        $referralCode->js_code=$jsCode;
        $referralCode->user_id=$userId;
        $referralCode->save();

    }


    public static function isAcceptRqustMoanyNow(){
        $membership= new Membership(Yii::$app->user->identity->membership_id);
        $lastRequst=PaymentRequest::find()->where(['user_id'=>Yii::$app->user->id])->orderBy(['create_at'=>SORT_DESC])->one();
        if(!empty($lastRequst)){
            $today = new \DateTime('now'); 
            $lastRequstDate   = new \DateTime($lastRequst->create_at); 
            $dteDiff  = $today->diff($lastRequstDate); 
          
             if($membership->daysForPay <= $dteDiff->days){
                 return true;
                 
             }else{
                 return $dteDiff;
                
             }
        }else{
            return true;
        }


    }

    public static function sendForGetPassword($email,$token)
    {

        error_reporting(E_ALL);

        $to = $email;
        $subject = 'Rest Password';
        $message = self::returnHrmlResetPassord($token);
        $headers = 'From: support@youarearich.org' . "\r\n" .
            'Reply-To: support@youarearich.org' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($to, $subject, $message, $headers);

    }
    


    public static function sendEmailValidation(){

        error_reporting(E_ALL);
        $whitelist = array(
            '127.0.0.1',
            '::1',
        );

        if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
            $to = Yii::$app->user->identity->email;
            $subject = 'Send Validation Email';
            $message = self::returnHrmlEamilValidatonCode();
            $headers = 'From: support@youarearich.org' . "\r\n" .
                'Reply-To: support@youarearich.org' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            mail($to, $subject, $message, $headers);
        }
    }

    public static function returnHrmlEamilValidatonCode()
    {
        return '<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>validation email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style>
.bs-calltoaction{
    position: relative;
    width:auto;
    padding: 15px 25px;
    border: 1px solid black;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

    .bs-calltoaction > .row{
        display:table;
        width: calc(100% + 30px);
    }
     
        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:table-cell;
            vertical-align:middle;
        }

            .cta-contents{
                padding-top: 10px;
                padding-bottom: 10px;
            }

                .cta-title{
                    margin: 0 auto 15px;
                    padding: 0;
                }

                .cta-desc{
                    padding: 0;
                }

                .cta-desc p:last-child{
                    margin-bottom: 0;
                }

            .cta-button{
                padding-top: 10px;
                padding-bottom: 10px;
            }

@media (max-width: 991px){
    .bs-calltoaction > .row{
        display:block;
        width: auto;
    }

        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:block;
            vertical-align:middle;
            position: relative;
        }

        .cta-contents{
            text-align: center;
        }
}



.bs-calltoaction.bs-calltoaction-default{
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.bs-calltoaction.bs-calltoaction-primary{
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}

.bs-calltoaction.bs-calltoaction-info{
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.bs-calltoaction.bs-calltoaction-success{
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.bs-calltoaction.bs-calltoaction-warning{
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
}

.bs-calltoaction.bs-calltoaction-danger{
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}

.bs-calltoaction.bs-calltoaction-primary .cta-button .btn,
.bs-calltoaction.bs-calltoaction-info .cta-button .btn,
.bs-calltoaction.bs-calltoaction-success .cta-button .btn,
.bs-calltoaction.bs-calltoaction-warning .cta-button .btn,
.bs-calltoaction.bs-calltoaction-danger .cta-button .btn{
    border-color:#fff;
}
</style>
<body>
    <div class="contaiiner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">congratulations</h1>
            </div>
            <div class="col-md-12">
                <div class="bs-calltoaction bs-calltoaction-info">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title">Thank you '. Yii::$app->user->identity->full_name . 'for registration in <a href=" ' . Yii::$app->params["siteUrl"] . '/index.php?r=user/verification-email&verification_email=' . Yii::$app->user->identity->verification_code_email . '">youarearich.org</a> </h1>
                            <div class="cta-desc">
                                <p>'. Yii::$app->user->identity->full_name .' we are needed to confirmation email to save your account from any hacking or do reset your password. </p>
                                <p>To confirm your email click in button <a href=" '. Yii::$app->params["siteUrl"] . '/index.php?r=user/verification-email&verification_email='.Yii::$app->user->identity->verification_code_email.'">Go.</a></p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="'.Yii::$app->params["siteUrl"].'/index.php?r=user/verification-email&verification_email='.Yii::$app->user->identity->verification_code_email.'" class="btn btn-lg btn-block btn-info">Go!</a>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>';
    }


    public static function returnHrmlResetPassord($token)
    {
        return '<!DOCTYPE html>
    <html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>validation email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<style>
.bs-calltoaction{
    position: relative;
    width:auto;
    padding: 15px 25px;
    border: 1px solid black;
    margin-top: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
}

    .bs-calltoaction > .row{
        display:table;
        width: calc(100% + 30px);
    }
     
        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:table-cell;
            vertical-align:middle;
        }

            .cta-contents{
                padding-top: 10px;
                padding-bottom: 10px;
            }

                .cta-title{
                    margin: 0 auto 15px;
                    padding: 0;
                }

                .cta-desc{
                    padding: 0;
                }

                .cta-desc p:last-child{
                    margin-bottom: 0;
                }

            .cta-button{
                padding-top: 10px;
                padding-bottom: 10px;
            }

@media (max-width: 991px){
    .bs-calltoaction > .row{
        display:block;
        width: auto;
    }

        .bs-calltoaction > .row > [class^="col-"],
        .bs-calltoaction > .row > [class*=" col-"]{
            float:none;
            display:block;
            vertical-align:middle;
            position: relative;
        }

        .cta-contents{
            text-align: center;
        }
}



.bs-calltoaction.bs-calltoaction-default{
    color: #333;
    background-color: #fff;
    border-color: #ccc;
}

.bs-calltoaction.bs-calltoaction-primary{
    color: #fff;
    background-color: #337ab7;
    border-color: #2e6da4;
}

.bs-calltoaction.bs-calltoaction-info{
    color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
}

.bs-calltoaction.bs-calltoaction-success{
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}

.bs-calltoaction.bs-calltoaction-warning{
    color: #fff;
    background-color: #f0ad4e;
    border-color: #eea236;
}

.bs-calltoaction.bs-calltoaction-danger{
    color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
}

.bs-calltoaction.bs-calltoaction-primary .cta-button .btn,
.bs-calltoaction.bs-calltoaction-info .cta-button .btn,
.bs-calltoaction.bs-calltoaction-success .cta-button .btn,
.bs-calltoaction.bs-calltoaction-warning .cta-button .btn,
.bs-calltoaction.bs-calltoaction-danger .cta-button .btn{
    border-color:#fff;
}
</style>
<body>
    <div class="contaiiner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">congratulations</h1>
            </div>
            <div class="col-md-12">
                <div class="bs-calltoaction bs-calltoaction-info">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title"><a href="' . Yii::$app->params["siteUrl"] .
                            '/index.php?r=site/new-password&token=' . $token. '" 
                            class="btn btn-lg btn-block btn-info">Set New Password</a> </h1>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>';
    } 

}



?>