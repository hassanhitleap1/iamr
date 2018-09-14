<?php

namespace  app\components;

use Yii;
use yii\base\BaseObject;
use app\models\Balance;
use app\models\Referral;
use app\models\ReferralCode;
use app\models\PaymentRequest;


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
    


    public static function sendEmailValidation(){
        Yii::$app->mailer->compose()
        ->setFrom(Yii::$app->params['adminEmail'])
        ->setTo(Yii::$app->user->identity->email)
        ->setSubject('Send Validation Email')
        ->setTextBody('Verification Code is ' .Yii::$app->user->identity->verification_code_email )
       // ->setHtmlBody('<b>HTML content</b>')
        ->send();
    }
}

?>