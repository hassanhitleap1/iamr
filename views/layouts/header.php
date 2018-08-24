<header class="header-h2">
    <div class="topbar tb-dark tb-md">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="topbar-home2">
                        <div class="tb-contact tb-iconbox">
                            <ul>
                                <li><a href="contact.html"><i class="fa fa-map-marker" aria-hidden="true"></i><span><i>Find us</i> 325 admiral unit, North cost, USA</span></a></li>
                                <li><a href="mailto:admin@amwal.com"><i class="fa fa-envelope" aria-hidden="true"></i><span><i>Email us</i> admin@amwal.com</span></a></li>
                                <li><a href="tel:0100123456789"><i class="fa fa-phone" aria-hidden="true"></i><span><i>Call us now</i> 0100123456789</span></a></li>
                            </ul>
                        </div>
                        <div class="tb-social-lan language">
                            <select class="lang">
                                <option data-class="usa">English</option>
                                <option data-class="italy">Italian</option>
                                <option data-class="fr">French</option>
                                <option data-class="gm">German</option>
                            </select>
                            <ul>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="google plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /topbar -->
    <div class="nav-warp nav-warp-h2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navi-warp-home-2">
                        <a href="index-2.html" class="logo"><img src="<?= Yii::getAlias('@theme')?>/images/Logo-on-light.png" class="img-responsive" alt="Image"></a>
                        <nav>

                            <ul class="navi-level-1 active-subcolor">
                                <li class="<?php echo (Yii::$app->controller->route == 'site/index') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','Home'),['site/index'])?></li>
                                <li class="<?php echo (Yii::$app->controller->route == 'site/why-100-doller') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','why-100-doller'),['site/why-100-doller'])?></li>
                                <li class="<?php echo (Yii::$app->controller->route == 'site/freq') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','Freq'),['site/freq'])?></li>
                                <li class="<?php echo (Yii::$app->controller->route == 'site/site/make-money') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','make-money'),['site/make-money'])?></li>
                                <li class="<?php echo (Yii::$app->controller->route == 'site/index') ? 'signup' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','signup'),['site/signup'])?></li>
                                <li class="<?php echo (Yii::$app->controller->route == 'site/login') ? 'active' : '' ?>"><?= \yii\helpers\Html::a(Yii::t('app','login'),['site/login'])?></li>
                            </ul>
                        </nav>
                        <a href="#menu" class="btn-menu-mobile"><i class="fa fa-bars" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /nav -->
</header>