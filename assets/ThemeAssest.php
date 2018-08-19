<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ThemeAssest extends AssetBundle
{
    public $basePath = '@webroot/theme';
    public $baseUrl = '@web/theme';
    public $css = [
        'fonts/font-awesome/css/font-awesome.min.css',
        'fonts/IcoMoon/icomoon.css',
        'fonts/linearicon/style.css',
        'css/jquery.mmenu.all.css',
        'css/owl.carousel.css',
        'css/fancySelect.css',
        'revolution/css/settings.css',
        'revolution/css/layers.css',
        'revolution/css/navigation.css',
        'style.css',
        'switcher/demo.css',
        'switcher/colors/index.html',
        'images/favicon.png',


    ];
    public $js = [
        'js/vendor/jquery.min.js',
        'js/vendor/bootstrap.js',
        'js/plugins/jquery.mmenu.all.min.js',
        'js/plugins/mobilemenu.js',
        'revolution/js/jquery.themepunch.tools.min.js',
        'revolution/js/jquery.themepunch.revolution.min.js',
        'revolution/js/extensions/revolution.extension.actions.min.js',
        'revolution/js/extensions/revolution.extension.carousel.min.js',
        'revolution/js/extensions/revolution.extension.kenburn.min.js',
        'revolution/js/extensions/revolution.extension.layeranimation.min.js',
        'revolution/js/extensions/revolution.extension.migration.min.js',
        'revolution/js/extensions/revolution.extension.navigation.min.js',
        'revolution/js/extensions/revolution.extension.parallax.min.js',
        'revolution/js/extensions/revolution.extension.slideanims.min.js',
        'revolution/js/extensions/revolution.extension.video.min.js',
        'js/plugins/slider-home-2.js',
        'js/plugins/owl.carousel.js',
        'js/plugins/owl.js',
        'js/plugins/royal_preloader.js',
        'js/plugins/jquery.parallax-1.1.3.js',
        'js/plugins/fancySelect.js',
        'js/plugins/lang-select.js',
        'js/plugins/cb-select.js',
        'js/plugins/jquery.counterup.min.js',
        'js/plugins/counterup.js',
        'js/plugins/template.j',
        'switcher/demo.js',

    ];
    public $depends = [
     
    ];
}
