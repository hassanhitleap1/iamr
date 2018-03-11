


<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\ThemeAssest;
use yii\web\View;
use richardfan\widget\JSRegister;

ThemeAssest::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<?php $dir = Yii::$app->language == 'ar' ? 'rtl' : 'ltr' ?>
<html lang="<?= Yii::$app->language ?>" dir= <?= $dir ?> >
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="header_sticky onepage">
<?php $this->beginBody() ?>
     <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>   
    <!-- Boxed -->
    <div class="boxed">

        <!-- Header -->            
        <header id="header" class="header clearfix">
            <div class="container">
                <div class="row">                 
                    <div class="header-wrap clearfix">
                        <div class="col-md-4">
                            <div id="logo" class="logo">
                                <a href="index-2.html" rel="home">
                                    <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/logo.png" alt="image">
                                </a>
                            </div><!-- /.logo -->
                            <div class="btn-menu">
                                <span></span>
                            </div><!-- //mobile menu button -->
                        </div>
                        <div class="col-md-8">
                            <div class="nav-wrap">                            
                                <nav id="mainnav" class="mainnav">
                                    <ul class="menu"> 
                                        <li class="home">
                                            <a href="index-2.html">Home</a> 
                                        </li>
                                        <li><a href="#about">About</a></li>
                                        <li><a href="#portfolio">Portfolio</a></li>
                                        <li><a href="#contact">Contact Us</a></li>
                                        <li><a href="#blog">Blog</a>
                                            <ul class="submenu right-sub-menu"> 
                                                <li><a href="blog.html">Blog </a>
                                                </li>
                                                <li><a href="blog-single.html">Blog Single</a>
                                                </li>
                                            </ul><!-- /.submenu -->
                                        </li>                        
                                    </ul><!-- /.menu -->
                                </nav><!-- /.mainnav -->

                                <div class="top-search">  
                                    <form role="search" id="searchform-all" method="get" class="search-form" action="#">
                                        <label>                                    
                                            <input type="search" id="s" class=" sss search-field" placeholder="Search …" value="" name="s">
                                        </label>
                                        <input type="submit" class="search-submit" value="" id="searchsubmit">
                                    </form> 
                                </div><!-- /top-search -->  

                                <ul class="menu menu-extra">
                                    <li class="show-search">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </li>
                                </ul>  
                            </div><!-- /.nav-wrap -->
                            
                        </div>                      
                    </div><!-- /.header-inner -->                 
                </div><!-- /.row -->
            </div>
        </header><!-- /.header -->

        <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                    <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
                    <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                        <div class="slotholder"></div>
                        <ul><!-- SLIDE  -->
                    
                            <!-- SLIDE 3 -->
                            <li data-index="rs-3049" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-duration="0">                        

                                <!-- MAIN IMAGE -->
                                <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/slides/2.jpg"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="0" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->

                                <!-- LAYER NR. 12 -->
                                <div class="tp-caption title-slide" 
                                    id="slide-3049-layer-1" 
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['middle','middle','middle','middle']" data-voffset="['-10','0','0','0']" 
                                    data-fontsize="['100','80','65','45']"
                                    data-lineheight="['110','80','65','45']"
                                    data-fontweight="['700','700','700','700']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="text" 
                                    data-responsive_offset="on"                             

                                    data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[10,10,10,10]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 16; white-space: nowrap;text-transform:left;">Great websites
                                </div>

                                <!-- LAYER NR. 13 -->
                                <div class="tp-caption sub-title" 
                                    id="slide-3049-layer-4" 
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['middle','middle','middle','middle']" data-voffset="['-105','-105','-50','-50']"
                                    data-fontsize="['22',22','22','14']" 
                                    data-fontweight="['300','300','300','300']"
                                    data-width="660"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="text" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 17; white-space: nowrap;text-transform:left;">We are design
                                </div>

                                <a href="#" target="_self" class="tp-caption flat-button-slider bg-orange"         

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                             
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['130','130','100','80']" 
                                data-width="['auto']"
                                data-height="['auto']">Contact Us
                                </a><!-- END LAYER LINK -->                            
                            </li>   
                             <!-- SLIDE 3 -->
                            <li data-index="rs-3048" data-transition="random-static" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="" data-duration="0">                        

                                <!-- MAIN IMAGE -->
                                <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/slides/1.jpg"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="0" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                                <!-- LAYERS -->
                                <div class="overlay-slider"></div>
                                <!-- LAYER NR. 12 -->
                                <div class="tp-caption title-slide" 
                                    id="slide-3048-layer-1" 
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['middle','middle','middle','middle']" data-voffset="['-10','0','0','0']" 
                                    data-fontsize="['100','80','65','45']"
                                    data-lineheight="['110','80','65','45']"
                                    data-fontweight="['700','700','700','700']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="text" 
                                    data-responsive_offset="on"                             

                                    data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[10,10,10,10]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 16; white-space: nowrap;text-transform:left;">Great websites
                                </div>

                                <!-- LAYER NR. 13 -->
                                <div class="tp-caption sub-title" 
                                    id="slide-3048-layer-8" 
                                    data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                    data-y="['middle','middle','middle','middle']" data-voffset="['-105','-105','-50','-50']"
                                    data-fontsize="['22',22','22','14']" 
                                    data-fontweight="['300','300','300','300']"
                                    data-width="660"
                                    data-height="none"
                                    data-whitespace="nowrap"
                         
                                    data-type="text" 
                                    data-responsive_offset="on" 

                                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                    data-textAlign="['center','center','center','center']"
                                    data-paddingtop="[0,0,0,0]"
                                    data-paddingright="[0,0,0,0]"
                                    data-paddingbottom="[0,0,0,0]"
                                    data-paddingleft="[0,0,0,0]"

                                    style="z-index: 17; white-space: nowrap;text-transform:left;">We are design
                                </div>

                                <a href="#" target="_self" class="tp-caption flat-button-slider bg-orange"         

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                             
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                                data-y="['middle','middle','middle','middle']" data-voffset="['130','130','100','80']" 
                                data-width="['auto']"
                                data-height="['auto']">Contact Us
                                </a><!-- END LAYER LINK -->                            
                            </li>                                        
                        </ul>
                    </div>
        </div><!-- END REVOLUTION SLIDER -->

        <!-- Iconbox -->
        <section class="flat-row about" id="about" >
            <div class="container">            
                <div class="row">
                    <div class="col-md-4 col-sm-6 section-reponsive">
                        <div class="iconbox center square">                    
                            <div class="box-header">
                                <i class="fa fa-pie-chart"></i>                            
                                <div class="box-title"><a href="#">Mobile App Development</a></div>
                            </div>
                            <div class="box-content">
                               Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, 
                            </div>
                            
                        </div><!-- /.iconbox -->                    
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-4 col-sm-6 section-reponsive">
                        <div class="iconbox center square">                    
                            <div class="box-header">
                                <i class="fa fa-line-chart"></i>                           
                                <div class="box-title"><a href="#">Mobile App Design</a></div>
                            </div>
                            <div class="box-content">
                               Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, 
                            </div>
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-4 col-sm-6 section-reponsive">
                        <div class="iconbox center square">                    
                            <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>                           
                                <div class="box-title"><a href="#">Smartphone App Development</a></div>
                            </div>
                            <div class="box-content">
                               Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, 
                            </div>
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-4 -->               
                </div> 

                <div class="empty-space height60"></div>

                <div class="row">
                    <div class="col-md-4 col-sm-6 section-reponsive">
                        <div class="iconbox center square">                    
                            <div class="box-header">
                                <i class="fa fa-pie-chart"></i>                            
                                <div class="box-title"><a href="#">Tablet App Development</a></div>
                            </div>
                            <div class="box-content">
                               Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, 
                            </div>
                            
                        </div><!-- /.iconbox -->                    
                    </div><!-- /.col-md-4 -->


                    <div class="col-md-4 col-sm-6 section-reponsive">
                        <div class="iconbox center square">                    
                            <div class="box-header">
                                <i class="fa fa-line-chart"></i>                           
                                <div class="box-title"><a href="#">HTML5 Mobile Development</a></div>
                            </div>
                            <div class="box-content">
                               Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, 
                            </div>
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-4 col-sm-6 section-reponsive">
                        <div class="iconbox center square">                    
                            <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>                           
                                <div class="box-title"><a href="#">iOS App Development</a></div>
                            </div>
                            <div class="box-content">
                               Nullam ultricies urna id ornare interdum. Maecenas ut suscipit mauris, 
                            </div>
                        </div><!-- /.iconbox -->
                    </div><!-- /.col-md-4 -->               
                </div> 

               
            </div><!-- /.container -->   
        </section> 

        <!-- Portfolio -->
        <section class="flat-row background-color" id="portfolio">  
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1 class="title">Our Last Project</h1>                                  
                        </div>
                    </div><!-- /.col-md-12 -->
                </div>

                <div class="row">
                    <div class="col-md-12">                           
                        <ul class="portfolio-filter">
                            <li class="active"><a data-filter="*" href="#">All Projects</a></li>
                            <li><a data-filter=".builder" href="#">Web Developer</a></li>
                            <li><a data-filter=".electric" href="#">Makerting Online</a></li>
                            <li><a data-filter=".hammer" href="#">Mobile App Design</a></li>
                            <li><a data-filter=".painting" href="#">iOS App Development</a></li>
                        </ul><!-- /.project-filter -->
                    </div>
                </div>
            </div> 

            <div class="flat-portfolio v4">             
                <div class="portfolio-wrap clearfix">
                    <div class="item electric painting">                                
                        <div class="featured-<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/portfolio/1.jpg" alt="images">
                            <h3 class="project-title">Mobile App Design</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item builder hammer">                                
                        <div class="featured-images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/portfolio/2.jpg" alt="images">
                            <h3 class="project-title">Mobile App Development</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item electric hammer painting">                                
                        <div class="featured-<?= Yii::$app->getUrlManager()->getBaseUrl() ?>">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/portfolio/3.jpg" alt="images">
                            <h3 class="project-title">HTML5 Mobile Development</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item builder hammer">                                
                        <div class="featured-images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/portfolio/4.jpg" alt="images">
                            <h3 class="project-title">iOS App Development</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item hammer painting">                                
                        <div class="featured-images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/portfolio/5.jpg" alt="images">
                            <h3 class="project-title">Mobile App Design</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item builder hammer ">                                
                        <div class="featured-images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/portfolio/6.jpg" alt="images">
                            <h3 class="project-title">Mobile App Development</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item  electric  painting">                                
                        <div class="featured-images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/portfolio/7.jpg" alt="images">
                            <h3 class="project-title">HTML5 Mobile Development</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->

                    <div class="item builder electric  painting">                                
                        <div class="featured-images">
                            <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/portfolio/8.jpg" alt="images">
                            <h3 class="project-title">iOS App Development</h3>
                            <div class="overlay"></div>                    
                        </div><!-- /.featured-images -->                                              
                    </div><!-- /.portfolio-item -->                
                </div><!-- /.portfolio-wrap -->
                <div class="empty-space height60"></div>
                <div class="flat-wrap-button text-center clearfix">
                	<a class="flat-button" href="#"> Our Project</a>
                </div>

            </div><!-- /.flat-portfolio --> 
        </section>     
          
        <!-- Blog -->
        <section class="flat-row" id="blog">        
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section">
                            <h1 class="title">Our Latest News</h1>                                  
                        </div>
                    </div><!-- /.col-md-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-shortcode blog-carosuel-wrap">
                            <div class="blog-carosuel">
                                <article class="post clearfix">
                                    <div class="featured-post">
                                        <div class="overlay"></div>
                                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/blog/b1.png" alt="image">
                                    </div><!-- /.feature-post -->
                                    <ul class="post-date">
                                        <li><a href="#">25 July 2017</a></li>
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Seo</a></li>                                  
                                    </ul>
                                    <div class="content-post">
                                        <h2 class="title-post"><a href="blog-single.html">Find the Best Construct</a></h2>                          
                                       
                                        <div class="entry-post">                              
                                            <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla
                                            </p>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article>

                                <article class="post clearfix">
                                    <div class="featured-post">
                                        <div class="overlay"></div>
                                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/blog/2.jpg" alt="image">
                                    </div><!-- /.feature-post -->
                                    <ul class="post-date">
                                        <li><a href="#">25 July 2017</a></li>
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Seo</a></li>                                  
                                    </ul>
                                    <div class="content-post">
                                        <h2 class="title-post"><a href="blog-single.html">Wates to revamp Goldfinger</a></h2>                          
                                       
                                        <div class="entry-post">                              
                                            <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla
                                            </p>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article>

                                <article class="post clearfix">
                                    <div class="featured-post">
                                        <div class="overlay"></div>
                                        <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/blog/3.jpg" alt="image">
                                    </div><!-- /.feature-post -->
                                    <ul class="post-date">
                                        <li><a href="#">25 July 2017</a></li>
                                        <li><a href="#">Business</a></li>
                                        <li><a href="#">Seo</a></li>                                  
                                    </ul>
                                    <div class="content-post">
                                        <h2 class="title-post"><a href="blog-single.html">London office work</a></h2> 
                                        <div class="entry-post">                              
                                            <p>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla
                                            </p>
                                        </div>
                                    </div><!-- /.content-post -->
                                </article>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </section>

        <!-- Map -->
        <div class="flat-row map" id="contact">
            <form id="contactform" class="flat-contact-form  inner-map style2 bg-dark height-small" method="post" action="http://corpthemes.com/html/contact/contact-process.php">
                <div class="field clearfix">      
                    <div class="wrap-type-input">                    
                        <div class="input-wrap name">
                            <input type="text" value="" tabindex="1" placeholder="Name" name="name" id="name" required>
                        </div>
                        <div class="input-wrap email">
                            <input type="email" value="" tabindex="2" placeholder="Email" name="email" id="email" required>
                        </div>                               
                    </div>
                    <div class="textarea-wrap">
                        <textarea class="type-input" tabindex="3" placeholder="Message" name="message" id="message-contact" required></textarea>
                    </div>
                </div>
                <div class="submit-wrap">
                    <button class="flat-button bg-theme">Send Message</button>
                </div>
            </form><!-- /.comment-form -->    
            <div id="flat-map">  
            </div>        
        </div><!-- /.flat-row -->

        <!-- Flat client style1 -->
        <section class="flat-row background-client">
            <div class="container">
                <div class="row">       
                    <div class="col-md-12">
                        <div class="flat-client style1" data-item="6" data-nav="false" data-dots="false" data-auto="true" data-margin="0">
                            <div class="item"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/clients/1.png" alt="images"></div>
                            <div class="item"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/clients/2.png" alt="images"></div>
                            <div class="item"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/clients/3.png" alt="images"></div>
                            <div class="item"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/clients/4.png" alt="images"></div>
                            <div class="item"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/clients/5.png" alt="images"></div>
                            <div class="item"><img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/clients/6.png" alt="images"></div>
                        </div><!-- /.flat-client -->      
                    </div>
                </div>
            </div>             
        </section>    

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row"> 
                        <div class="col-md-3 col-sm-6">  
                            <div class="widget widget_text widget_info">
                                <img src="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/theme/images/logo.png" alt="images">
                            </div><!-- /.widget -->      
                        </div><!-- /.col-md-3 --> 

                        <div class="col-md-3 col-sm-6">  
                            <div id="nav_menu-2" class="widget widget_nav_menu">
                                <h2 class="widget-title">About Us</h2>
                                <div class="menu-footer-container">
                                    <ul id="menu-footer" class="menu">
                                        <li class="menu-item"><a href="#">About us</a></li>
                                        <li class="menu-item"><a href="#">Contact us</a></li>
                                        <li class="menu-item"><a href="#">Power audits</a></li>
                                        <li class="menu-item"><a href="#">Remodels</a></li>
                                        <li class="menu-item"><a href="#">Carrers</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3 col-sm-6">
                           <div class="widget widget_socials">
                                <h2 class="widget-title">Quick Links</h2>
                                <ul>
                                    <li class="menu-item"><a href="#">Home</a></li>
                                    <li class="menu-item"><a href="#">Testimonials</a></li>
                                    <li class="menu-item"><a href="#">Corporate Client</a></li>
                                    <li class="menu-item"><a href="#">Services</a></li>
                                </ul>
                            </div>
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3 col-sm-6">
                            <div class="widget widget_text">
                                <h2 class="widget-title">Contact</h2>
                                <p>
                                    PO Box 16122 Collins Street West,Victoria
                                    8007 Australia
                                </p>

                                <p>Call us: 190 140 2468</p>

                                <p>e@themesflat.com</p>

                                
                            </div>
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.row -->    
                </div><!-- /.container -->
            </div><!-- /.footer-widgets -->

        </footer>

        <!-- Bottom -->
        <div class="bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright"> 
                            <p>© Copyright <a href="#">Themesflat</a> 2017. All Rights Reserved.
                            </p>
                        </div>                   
                    </div><!-- /.col-md-6 -->   

                    <div class="col-md-6">                    
                        <div class="social-links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a class="youtube" href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                        </div>                          
                    </div><!-- /.row -->
                </div>
            </div><!-- /.container -->
        </div>

        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>          

    </div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
