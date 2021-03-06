<?php
use yii\helpers\Url;
use richardfan\widget\JSRegister; 
/* @var $this yii\web\View */
$this->title = 'You are a rich';
?>
<div class="site-why-get-membership">

    <div class="container">
        <div class="row" style="margin-top:65px">

            <div class="row">
                <h1 class="title"><?= $model['title_' . Yii::$app->language] ?></h1>
            </div>
            <div class="row">
                <hr>
                <div class="col-md-7  col-md-offset-2">
                    <img src=<?= Yii::$app->request->baseUrl . '/image/page/1.png' ?> alt="" class="img-blog img-rounded">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-offset-2" style="margin-top: 41px;">
                           <?= $model['description_' . Yii::$app->language] ?>
                    </div>
                </div>

            </div>
       
        </div>
    </div>
    <div class="container" id="container">
        <div class="row">
            <div class="col-md-6">
            <img src=<?= Yii::$app->request->baseUrl . '/image/page/1.png' ?> alt="" class="img-blog img-thumbnail">
            </div> 
            <div class="col-md-6">
            <img src=<?= Yii::$app->request->baseUrl . '/image/page/3.png' ?> alt="" class="img-blog img-thumbnail">
            </div>   
        </div>
        <div class="row">
            <div class="col-md-6">
            <img src=<?= Yii::$app->request->baseUrl . '/image/page/6.png' ?> alt="" class="img-blog img-thumbnail">
            </div> 
            <div class="col-md-6">
            <img src=<?= Yii::$app->request->baseUrl . '/image/page/8.png' ?> alt="" class="img-blog img-thumbnail">
            </div>   
        </div>
    

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div  class="btn btn-primary btn-block" id="loadMore"><?= Yii::t('app', 'Load_more') ?></div>
            </div>
        </div>
    </div>
</div>

<?php JSRegister::begin(); ?>
<script>
$(document).ready(function () {
    $("#loadMore").click(function (e) { 
        e.preventDefault();
            
        var content='<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/13.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div> \n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/14.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>  \n'+ 
        '</div>\n'+
        
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/15.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div> \n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/16.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div> \n'+  
        '</div>\n'+
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/17.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/18.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>\n'+
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/12.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/26.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>\n'+
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/13.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/14.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>\n'+
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/19.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/20.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>\n'+
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/21.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/22.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>\n'+
        '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/24.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/25.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>\n'+
       '<div class="row">\n'+
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/26.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+ 
            '<div class="col-md-6">\n'+
            '<img src=<?= Yii::$app->request->baseUrl . '/image/page/14.png' ?> alt="" class="img-blog img-thumbnail">\n'+
            '</div>\n'+   
        '</div>';
    
       $("#container").append(content);
        $("#loadMore").css("display", "none");
    });
});
</script>
<?php JSRegister::end(); ?>

