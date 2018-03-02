<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\View;
use richardfan\widget\JSRegister;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<?php $dir = Yii::$app->language=='ar'? 'rtl' : 'ltr' ?>
<html lang="<?= Yii::$app->language ?>" dir= <?= $dir ?> >
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
                 [
                        'label' =>Yii::t('app','Logout') .' (' . Yii::$app->user->identity->email . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                ]
           ],
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
<?php JSRegister::begin(); ?>
<script>
$(document).ready(function(){
    var itaImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Italien.gif";
    var engImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Grossbritanien.gif";
    var deuImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Deutschland.gif";
    var fraImgLink = "http://www.roemheld.de/IT/Data/Images/Address/Frankreich.gif";
    var arbImgLink = "https://images-na.ssl-images-amazon.com/images/I/31VsQPsLJFL._SL500_AC_SS350_.jpg";

    var imgBtnSel = $('#imgBtnSel');
    var imgBtnIta = $('#imgBtnIta');
    var imgBtnEng = $('#imgBtnEng');
    var imgBtnDeu = $('#imgBtnDeu');
    var imgBtnFra = $('#imgBtnFra');
    var imgBtnArb = $('#imgBtnArb');

    var imgNavSel = $('#imgNavSel');
    var imgNavIta = $('#imgNavIta');
    var imgNavEng = $('#imgNavEng');
    var imgNavDeu = $('#imgNavDeu');
    var imgNavFra = $('#imgNavFra');
    var imgNavArb = $('#imgNavArb');
    
    var spanNavSel = $('#lanNavSel');
    var spanBtnSel = $('#lanBtnSel');
    currentId = getCookie('currentId');

    
    if(typeof(currentId) != "undefined" && currentId !== null) {
        
        imgBtnSel.attr("src", engImgLink);
        imgBtnIta.attr("src",itaImgLink);
        imgBtnEng.attr("src",engImgLink);
        imgBtnDeu.attr("src",deuImgLink);
        imgBtnFra.attr("src",fraImgLink);
        imgBtnFra.attr("src",arbImgLink);

        imgNavSel.attr("src", engImgLink);
        imgNavIta.attr("src",itaImgLink);
        imgNavEng.attr("src",engImgLink);
        imgNavDeu.attr("src",deuImgLink);
        imgNavFra.attr("src",fraImgLink);
        imgNavArb.attr("src",arbImgLink);

        if(currentId == "navIta") {
            imgNavSel.attr("src",itaImgLink);
            spanNavSel.text("ITA");
            } else if (currentId == "navEng") {
                imgNavSel.attr("src",engImgLink);
                spanNavSel.text("ENG");
            } else if (currentId == "navDeu") {
                imgNavSel.attr("src",deuImgLink);
                spanNavSel.text("DEU");
            } else if (currentId == "navFra") {
                imgNavSel.attr("src",fraImgLink);
                spanNavSel.text("FRA");
            }else if (currentId == "navArb") {
                imgNavSel.attr("src",arbImgLink);
                spanNavSel.text("ARB");
            }

            if(currentId == "btnIta") {
                imgBtnSel.attr("src",itaImgLink);
                spanBtnSel.text("ITA");
            } else if (currentId == "btnEng") {
                imgBtnSel.attr("src",engImgLink);
                spanBtnSel.text("ENG");
            } else if (currentId == "btnDeu") {
                imgBtnSel.attr("src",deuImgLink);
                spanBtnSel.text("DEU");
            } else if (currentId == "btnFra") {
                imgBtnSel.attr("src",fraImgLink);
                spanBtnSel.text("FRA");
            } else if (currentId == "btnArb") {
                imgBtnSel.attr("src",arbImgLink);
                spanBtnSel.text("ARB");
            }

    }else{
        imgBtnSel.attr("src",engImgLink);
        imgBtnIta.attr("src",itaImgLink);
        imgBtnEng.attr("src",itaImgLink);
        imgBtnDeu.attr("src",deuImgLink);
        imgBtnFra.attr("src",fraImgLink);
        imgBtnFra.attr("src",arbImgLink);

        imgNavSel.attr("src",engImgLink);
        imgNavIta.attr("src",itaImgLink);
        imgNavEng.attr("src",engImgLink);
        imgNavDeu.attr("src",deuImgLink);
        imgNavFra.attr("src",fraImgLink);
        imgNavArb.attr("src",arbImgLink);
    }


    
    $( ".language" ).on( "click", function( event ) {

         currentId = $(this).attr('id');

        if(currentId == "navIta") {
        imgNavSel.attr("src",itaImgLink);
        spanNavSel.text("ITA");
        lang='it';
        } else if (currentId == "navEng") {
            imgNavSel.attr("src",engImgLink);
            spanNavSel.text("ENG");
            lang='en';
        } else if (currentId == "navDeu") {
            imgNavSel.attr("src",deuImgLink);
            spanNavSel.text("DEU");
            lang='de';
        } else if (currentId == "navFra") {
            imgNavSel.attr("src",fraImgLink);
            spanNavSel.text("FRA");
            lang='fr';
        }else if (currentId == "navArb") {
            imgNavSel.attr("src",arbImgLink);
            spanNavSel.text("ARB");
            lang='ar';
        }

        if(currentId == "btnIta") {
            imgBtnSel.attr("src",itaImgLink);
            spanBtnSel.text("ITA");
        } else if (currentId == "btnEng") {
            imgBtnSel.attr("src",engImgLink);
            spanBtnSel.text("ENG");
        } else if (currentId == "btnDeu") {
            imgBtnSel.attr("src",deuImgLink);
            spanBtnSel.text("DEU");
        } else if (currentId == "btnFra") {
            imgBtnSel.attr("src",fraImgLink);
            spanBtnSel.text("FRA");
        } else if (currentId == "btnArb") {
            imgBtnSel.attr("src",arbImgLink);
            spanBtnSel.text("ARB");
        }
        setCookie('currentId',currentId,1);
        setLang(lang);
    });// click on language 
});


function setLang(lang){
url='http://localhost/iamrich/web/index.php?r=base/language';

$.ajax({
     url: url,
     type: 'post',
     data: {'lang':lang},
     success: function (data) {
            location.reload(); 
       }

 });
}

function setCookie(cname, cvalue, exdays) {
var d = new Date();
d.setTime(d.getTime() + (exdays*24*60*60*1000));
var expires = "expires="+ d.toUTCString();
document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function getCookie(cname) {
var name = cname + "=";
var decodedCookie = decodeURIComponent(document.cookie);
var ca = decodedCookie.split(';');
for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
        c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
    }
}
return "";
}

</script>
<?php JSRegister::end(); ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
