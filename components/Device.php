<?php

namespace  app\components;
use Yii;
use yii\base\BaseObject;
use yii\base\Component;
use yii\base\InvalidConfigException;
use app\models\InfoDevice;

class Device extends BaseObject
{
	
	public static function  getIp(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
		
	}

	public static function getOS() { 

		$user_agent = $_SERVER['HTTP_USER_AGENT'];
	
		$os_platform  = "Unknown OS Platform";
	
		$os_array     = array(
							  '/windows nt 10/i'      =>  'Windows 10',
							  '/windows nt 6.3/i'     =>  'Windows 8.1',
							  '/windows nt 6.2/i'     =>  'Windows 8',
							  '/windows nt 6.1/i'     =>  'Windows 7',
							  '/windows nt 6.0/i'     =>  'Windows Vista',
							  '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
							  '/windows nt 5.1/i'     =>  'Windows XP',
							  '/windows xp/i'         =>  'Windows XP',
							  '/windows nt 5.0/i'     =>  'Windows 2000',
							  '/windows me/i'         =>  'Windows ME',
							  '/win98/i'              =>  'Windows 98',
							  '/win95/i'              =>  'Windows 95',
							  '/win16/i'              =>  'Windows 3.11',
							  '/macintosh|mac os x/i' =>  'Mac OS X',
							  '/mac_powerpc/i'        =>  'Mac OS 9',
							  '/linux/i'              =>  'Linux',
							  '/ubuntu/i'             =>  'Ubuntu',
							  '/iphone/i'             =>  'iPhone',
							  '/ipod/i'               =>  'iPod',
							  '/ipad/i'               =>  'iPad',
							  '/android/i'            =>  'Android',
							  '/blackberry/i'         =>  'BlackBerry',
							  '/webos/i'              =>  'Mobile'
						);
	
		foreach ($os_array as $regex => $value)
			if (preg_match($regex, $user_agent))
				$os_platform = $value;
	
		return $os_platform;
	}
	
	public  static function getBrowser() {
	
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
	
		$browser        = "Unknown Browser";
	
		$browser_array = array(
								'/msie/i'      => 'Internet Explorer',
								'/firefox/i'   => 'Firefox',
								'/safari/i'    => 'Safari',
								'/chrome/i'    => 'Chrome',
								'/edge/i'      => 'Edge',
								'/opera/i'     => 'Opera',
								'/netscape/i'  => 'Netscape',
								'/maxthon/i'   => 'Maxthon',
								'/konqueror/i' => 'Konqueror',
								'/mobile/i'    => 'Handheld Browser'
						 );
	
		foreach ($browser_array as $regex => $value)
			if (preg_match($regex, $user_agent))
				$browser = $value;
	
		return $browser;
	}


	public static  function setDeviceUser(){
		$ip=self::getIp();
		$infoDivce=new InfoDevice;
		$infoDivce->ip= $ip;
		$moreInfo=self::getMoreInfo();
		if(!$moreInfo == ""){
			
			$infoDivce->query =$moreInfo['query'];
			$infoDivce->continent =$moreInfo['continent'];
			$infoDivce->continent_code =$moreInfo['continentCode'];
			$infoDivce->country =$moreInfo['country'];
			$infoDivce->country_code =$moreInfo['countryCode'];
			$infoDivce->region =$moreInfo['region'];
			$infoDivce->region_name =$moreInfo['regionName'];
			$infoDivce->city =$moreInfo['city'];
			$infoDivce->zip =$moreInfo['zip'];
			$infoDivce->lat =$moreInfo['lat'];
			$infoDivce->lon =$moreInfo['lon'];
			$infoDivce->timezone =$moreInfo['timezone'];
			$infoDivce->currency =$moreInfo['currency'];
			$infoDivce->isp =$moreInfo['isp'];
			$infoDivce->org =$moreInfo['org'];
			$infoDivce->as =$moreInfo['as'];
			$infoDivce->asname =$moreInfo['asname'];
			$infoDivce->reverse =$moreInfo['reverse'];
			$infoDivce->mobile =$moreInfo['mobile'];
			$infoDivce->proxy =$moreInfo['proxy'];
		
		}
		
        $infoDivce->browser=self::getBrowser();
		$infoDivce->os =self::getOS();
        $infoDivce->user_id=Yii::$app->user->id;
        $infoDivce->save();
		
		
	}

	public static function getMoreInfo()
	{
		//Initialize cURL.
		$ch = curl_init();
		//Set the URL that you want to GET by using the CURLOPT_URL option.
		curl_setopt($ch, CURLOPT_URL, 'http://ip-api.com/php/'.Self::getIp().'?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,zip,lat,lon,timezone,currency,isp,org,as,asname,reverse,mobile,proxy,query');
		
		//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		
		//Execute the request.
		$data = curl_exec($ch);
		
		//Close the cURL handle.
		curl_close($ch);
		/*
		{
			"query": "24.48.0.1",
			"status": "success",
			"continent": "North America",
			"continentCode": "NA",
			"country": "Canada",
			"countryCode": "CA",
			"region": "QC",
			"regionName": "Quebec",
			"city": "Montreal",
			"zip": "H1S",
			"lat": 45.5807991027832,
			"lon": -73.5824966430664,
			"timezone": "America/Toronto",
			"currency": "CAD",
			"isp": "Le Groupe Videotron Ltee",
			"org": "Videotron Ltee",
			"as": "AS5769 Videotron Telecom Ltee",
			"asname": "ASN-VIDEOTRON",
			"reverse": "modemcable001.0-48-24.mc.videotron.ca",
			"mobile": false,
			"proxy": false
			}*/
		$moreInfo=json_decode($data);
		if($moreInfo['status'] == 'success') {
			return $moreInfo;
		}
		return "";

	}
}

?>