<?php

namespace app\components;

use Yii;
use yii\base\BaseObject;
use yii\base\Component;


class Membership extends BaseObject
{
    public $id;
    public $price;
    public $limitedReferrl;
    public $percentagePerReferral;
    public $daysForPay;
    public $commission;


    public function __construct($id)
    {
        switch ($id) {
            case 1:
                $this->id=1;
                $this->price=20;
                $this->limitedReferrl=100;
                $this->percentagePerReferral=0.10;
                $this->daysForPay=10;
                $this->commission=0.10;
                break;
            case 2:
                $this->id = 2;
                $this->price = 50;
                $this->limitedReferrl = null;
                $this->percentagePerReferral = 0.20;
                $this->daysForPay = 5;
                $this->commission=0.20;
                break;
            case 3:
                $this->id = 3;
                $this->price = 100;
                $this->limitedReferrl = null;
                $this->percentagePerReferral = 0.50;
                $this->daysForPay = 1;
                $this->commission=0.50;
                break;
                 default:
                $this->id = 1;
                $this->price = 20;
                $this->limitedReferrl = 100;
                $this->percentagePerReferral = 0.10;
                $this->daysForPay = 10;
                $this->commission=0.10;
        }
        $data["id"] =$this->id ;
        $data["price"] =$this->price ;
        $data["limitedReferrl"]  = $this->limitedReferrl ;
        $data["percentagePerReferral"]  = $this->percentagePerReferral ;
        $data["daysForPay"]  = $this->daysForPay ;
        $data["commission"]  = $this->commission ;
        return $data;
        
    }
    public static function getPrice(){
        return $this->price;
    }

    public static function getLimitedReferrl()
    {
        return $this->limitedReferrl;
    }

    public static function getPercentagePerReferral()
    {
        return $this->percentagePerReferral;
    }

    public static function getDaysForPay()
    {
        return $this->daysForPay;
    }

    public function getCommission(){
      return  $this->commission;
    }
    
}

?>