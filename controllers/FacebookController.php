<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use Facebook\Facebook;



class FacebookController extends Controller
{

    private $fb;
    private $helper;
    public function actionIndex(){
        $appId         = '394173574379206'; //Facebook App ID
        $appSecret     = 'dc097ecfce1f15f89b39acf9300c0305'; //Facebook App Secret
        $baseUrl = 'http://localhost/'.Yii::$app->getUrlManager()->getBaseUrl();
        $redirectURL   = "http://localhost/iamrich/web/index.php?r=facebook%2Fredirect"; //Callback URL
        $permissions = array('email');  //Optional permissions
        $this->fb = new Facebook(array(
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v2.12',
        ));
        $this->helper = $this->fb->getRedirectLoginHelper();
        $loginUrl = $this->helper->getLoginUrl($redirectURL, $permissions);
       
        return $this->redirect($loginUrl);
       
    }
    

        public function actionRedirect(){
        try{
            $accessToken =$this->helper->getAccessToken();
        }catch(Facebook\Exceptions\FacebookResponseException $e){
            echo "responce error exption".$e->getMessage();
            exit();
        }catch(Facebook\Exceptions\FacebookSDKException $e){
            echo "responce error exption".$e->getMessage();
            exit();
        }

        if (! isset($accessToken)) {
            if ($this->helper->getError()) {
              header('HTTP/1.0 401 Unauthorized');
              echo "Error: " . $this->helper->getError() . "\n";
              echo "Error Code: " . $this->helper->getErrorCode() . "\n";
              echo "Error Reason: " . $this->helper->getErrorReason() . "\n";
              echo "Error Description: " . $this->helper->getErrorDescription() . "\n";
            } else {
              header('HTTP/1.0 400 Bad Request');
              echo 'Bad request';
            }
            exit;
          }
 
            var_dump($accessToken->getValue());

            // The OAuth 2.0 client handler helps us manage access tokens
            $oAuth2Client = $this->fb->getOAuth2Client();

            $tokenMetadata = $oAuth2Client->debugToken($accessToken);
            echo '<h3>Metadata</h3>';
            var_dump($tokenMetadata);

            // Validation (these will throw FacebookSDKException's when they fail)
            $tokenMetadata->validateAppId('{app-id}'); // Replace {app-id} with your app id
            // If you know the user ID this access token belongs to, you can validate it here
            //$tokenMetadata->validateUserId('123');
            $tokenMetadata->validateExpiration();

            if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
                exit;
            }

            echo '<h3>Long-lived</h3>';
            var_dump($accessToken->getValue());
            }
           // $rresponse = $this->fb->get(endpoint:"me?fields=id,name,email,first_name,last_name");
            //$_SESSION['fb_access_token'] = (string) $accessToken;


    }
}