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
        'stylesheets/bootstrap.css',
        'stylesheets/style.css',
        'stylesheets/responsive.css',
        'revolution/css/layers.css',
        'revolution/css/settings.css',
        'stylesheets/colors/color1.css',
        'stylesheets/animate.css',
    ];
    public $js = [
       // 'js/lang.js',
        'javascript/jquery.min.js',
        'javascript/bootstrap.min.js',
        'javascript/jquery.easing.js',
        'javascript/imagesloaded.min.js',
        'javascript/jquery.isotope.min.js',
        'javascript/jquery-waypoints.js',
        'javascript/jquery.magnific-popup.min.js',
        'javascript/jquery.cookie.js',
        'javascript/parallax.js',
        'javascript/owl.carousel.js',
        'javascript/jquery-validate.js',
        'javascript/switcher.js',
        'https://maps.googleapis.com/maps/api/js?key=AIzaSyAHtWltCIolOgzpMEfi_GVZZHCkrXH10SM&amp;region=GB',
        'javascript/gmap3.min.js',
        'javascript/main.js',
        'revolution/js/jquery.themepunch.tools.min.js',
        'revolution/js/jquery.themepunch.revolution.min.js',
        'revolution/js/slider.js',
        'revolution/js/extensions/revolution.extension.actions.min.js',
        'revolution/js/extensions/revolution.extension.carousel.min.js',
        'revolution/js/extensions/revolution.extension.kenburn.min.js',
        'revolution/js/extensions/revolution.extension.layeranimation.min.js',
        'revolution/js/extensions/revolution.extension.migration.min.js',
        'revolution/js/extensions/revolution.extension.navigation.min.js',
        'revolution/js/extensions/revolution.extension.parallax.min.js',
        'revolution/js/extensions/revolution.extension.slideanims.min.js',
        'revolution/js/extensions/revolution.extension.video.min.js',
    ];
    public $depends = [
     
    ];
}
