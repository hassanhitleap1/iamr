<?php

namespace  app\components;

use yii\base\BaseObject;
use app\models\Balance;
use app\models\Referral;
use app\models\ReferralCode;


class UserHelper extends BaseObject
{
	
    public function setBalance($userId){
        $balanceModel= new Balance;
        $balanceModel->balance=0.00;
        $balanceModel->user_id=$userId;
        $balanceModel->save();
    }

    public function setReferral($userId,$userIdReferral){
        $referral= new Referral;
        $referral->user_id=$userId;
        $referral->user_id_referral=$userIdReferral;
        $referral->save();
    }

    public function setReferralCode($userId){
        $referralCode= new ReferralCode;
        
        $jsCode="<img  onclick='openInNewTab();' 
        src='https://static-ca.ebgames.ca/images/products/606502/3max.jpg'  
        style='width: 466px; height: 45px;' id='link' /><script>
        function openInNewTab() 
        {
            var url='https://stackoverflow.com/posts/11384018/revisions';
            var win = window.open(url, '_blank');
            win.focus();
        }
        </script>";
        $htmlCode= 'http://'.Yii::$app->request->baseUrl.'/index.php?r=site%2Fsignup';
        $referralCode->html_code=$htmlCode;
        $referralCode->js_code=$jsCode;
        $referralCode=$userId;
        $referralCode->save();
    }
}

?>