<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\ThemeAssest;
use yii\web\View;
use richardfan\widget\JSRegister;

//AppAsset::register($this);
$dir = Yii::$app->language == 'ar' ? 'rtl' : 'ltr';
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir= <?= $dir ?> >
<?php include 'head.php'?>
<body class="royal_loader">
<!-- royal_loader -->
<div id="page">
    <!-- Mobile Menu -->
    <?php include 'menu.php';?>
    <!-- /Mobile Menu -->
    <?php include 'header.php'?>
    <!-- /End Header 1 Warp -->
    <?= $content ?>

    <?php include 'footer.php'?>
</div>
<!-- /page -->
<a id="to-the-top" class="fixbtt bg-hover-theme"><i class="fa fa-chevron-up"></i></a>
<!-- Back To Top -->

<?php include 'js.php'?>

</body>
</html>

