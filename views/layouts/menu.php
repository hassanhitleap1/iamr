<nav id="menu">
    <ul>
        <li class="<?php echo (Yii::$app->controller->route == 'site/index') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','Home'),['site/index'])?></li>
        <li class="<?php echo (Yii::$app->controller->route == 'site/why-100-doller') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','why-100-doller'),['site/why-100-doller'])?></li>
        <li class="<?php echo (Yii::$app->controller->route == 'site/freq') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','Freq'),['site/freq'])?></li>
        <li class="<?php echo (Yii::$app->controller->route == 'site/site/make-money') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','make-money'),['site/make-money'])?></li>
        <li class="<?php echo (Yii::$app->controller->route == 'site/index') ? 'signup' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','signup'),['site/signup'])?></li>
        <li class="<?php echo (Yii::$app->controller->route == 'site/login') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','login'),['site/login'])?></li>

    </ul>
</nav>