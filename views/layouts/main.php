<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
<?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name ,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
        ['label' => Yii::t('app','why-300-doller'), 'url' => ['/site/why-300-doller']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app','signup'), 'url' => ['/site/signup']];
        $menuItems[] = ['label' => Yii::t('app','login'), 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => Yii::t('app','profile'),
            'items' => [
                ['label' => Yii::t('app','my_profile'), 'url' => ['/user/profile']],
                '<li class="divider"></li>',
                ['label' => Yii::t('app','Referral'), 'url' => ['/user/referral']],
                ['label' =>  Yii::t('app','Payment_Request'), 'url' => ['/payment-request/index']],
           ],
        ]; 
          $menuItems[] = [
                        'label' =>Yii::t('app','Logout') .' (' . Yii::$app->user->identity->email . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ];
      

    }
      $menuItems[]= [
            'label' => '<img id="imgNavSel" src="" alt="..." class="img-thumbnail icon-small">  <span id="lanNavSel">ENG</span> ',
            'linkOptions' => ['data-toggle' => 'dropdown', 'role'=>'button',
             'aria-expanded'=>'false'],
             'encode' => false,
            'items' => [

             '<li>
                <a id="navEng" href="#" class="language">
                    <img id="imgNavEng" src="" alt="..." class="img-thumbnail icon-small">  
                    <span id="lanNavEng">English</span>
                </a>
            </li>',
            
            '<li>
                <a id="navIta" href="#" class="language">
                     <img id="imgNavIta" src="" alt="..." class="img-thumbnail icon-small">  
                     <span id="lanNavIta">Italiano</span>
                 </a>
            </li>',

            '<li>
                <a id="navDeu" href="#" class="language">
                     <img id="imgNavDeu" src="" alt="..." class="img-thumbnail icon-small"> 
                      <span id="lanNavDeu">Deutsch</span>
                 </a>
             </li>',

            '<li>
                <a id="navFra" href="#" class="language">
                    <img id="imgNavFra" src="" alt="..." class="img-thumbnail icon-small">  
                    <span id="lanNavFra">Francais</span>
                </a>
            </li>',

            '<li>
                <a id="navArb" href="#" class="language">
                    <img id="imgNavArb" src="" alt="..." class="img-thumbnail icon-small">  
                    <span id="lanNavEng">Arbic</span>
                </a>
            </li>',

           ],
        ];  
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php if(! Yii::$app->user->isGuest):?>
            <?php if(! Yii::$app->user->identity->status):?>
                    <div class="alert alert-info">
                        <strong>Info!</strong>  <a href=<?= \yii\helpers\Url::to(['site/payment']);?> >to get referral must be pay (donation) to the site and show your information for the world  </a>
                    </div>
            <?php endif;?> 
        <?php endif;?> 
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
  
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
