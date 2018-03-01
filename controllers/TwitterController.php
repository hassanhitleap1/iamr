<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;


class TwitterController extends Controller
{
    public function actionIndex(){

        define('CONSUMER_KEY', 'JYP9EdfzxBBDIgJnLgIDawcRN'); // add your app consumer key between single quotes
        define('CONSUMER_SECRET', 'nqs8PF1eQxRBrErvFfEjsrg6qwYcKuyGJ1nxIuyx7zAROgMB1e'); // add your app consumer secret key between single quotes
        define('OAUTH_CALLBACK', 'http://localhost/iamrich/web/index.php?r=twitter/redirect'); // your app callback URL
        if (!isset($_SESSION['access_token'])) {
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
            $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
            $_SESSION['oauth_token'] = $request_token['oauth_token'];
            $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
            $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
            echo $url;
        } else {
            $access_token = $_SESSION['access_token'];
            $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
            $user = $connection->get("account/verify_credentials");
            echo $user->screen_name;
        }
            }
  
}