<?php
use yii\helpers\Url;
use richardfan\widget\JSRegister;
/* @var $this yii\web\View */
$this->title =  Yii::t('app','make-money');
?>
<div class="site-make-money">

    <div class="container">
        <div class="row" style="margin-top:65px">

            <div class="row">
                <h1 class="title"><?= $model['title_' . Yii::$app->language] ?></h1>
            </div>
            <div class="row">
                <hr>
                <div class="col-md-7  col-md-offset-2">
                    <img src=<?= Yii::$app->request->baseUrl . '/image/page/make-maony.jpg' ?> alt="" class="img-blog img-rounded">
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
    <div class="container calculator">
        <div class="row">
            <div class="col-md-4 col-md-offset-2">
                <div class="form-group">
                <label for="ref">Number of Referral:</label>
                <input type="number" class="form-control" id="ref" value="1">
            </div>
            </div>
            <div class="col-md-6">
                <div class="" style="font-size: 32px;">
                    <span class="glyphicon glyphicon-usd" > </span> <strong id="amount">20 </strong>
                </div>
            </div>
        </div>
    </div>
</div>

<?php JSRegister::begin(); ?>
<script>
$(document).ready(function(){
    $( "#ref" ).change(function() {
    var number = $(this).val();
    if( 0 >= number ){
    $( "#amount" ).text( "error number must be real number" );
    }else{
    amount = number*20;
    $( "#amount" ).text( amount );
    }

    
    });
});
</script>
<?php JSRegister::end(); ?>