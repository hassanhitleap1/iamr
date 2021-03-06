<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


//AppAsset::register($this);
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
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    if (Yii::$app->admin->isGuest) {
        $menuItems[]= ['label' => 'Login', 'url' => ['default/login']];
      
    } else {
        $menuItems = [
            ['label' => 'Home', 'url' => ['default/index']],
            ['label' => 'User', 'url' => ['user/index']],
            ['label' => 'Pages', 'url' => ['page/index']],
            ['label' => 'Translations', 'url' => ['translation/index']],
            ['label' => 'Payment Request', 'url' => ['payment-request/index']], 
            ['label' => 'Freq', 'url' => ['freq/index']],
            ['label' => 'Contact', 'url' => ['contact/index']],

        ];
        $menuItems[] =   ['label' => 'Profile',
        'items' => [
            [
                'label' => 'Logout (' .  Yii::$app->admin->identity->username . ')',
                'url' => ['default/logout'],
                'linkOptions' => ['data-method' => 'post']
            ]
                ],
            ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Alm3lm <?= date('Y') ?></p>

        <p class="pull-right"><?= "Powered By " ?><?= Html::a('Virtecha', 'http://www.virtecha.com/', ['target' => '_blank']); ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



