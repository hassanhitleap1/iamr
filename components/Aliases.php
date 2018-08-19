<?php

namespace app\components;


use Yii;
use yii\base\Component;


class Aliases extends Component
{
    public function init()
    {
        Yii::setAlias('@theme', Yii::getAlias('@web').'/theme');
    }
}