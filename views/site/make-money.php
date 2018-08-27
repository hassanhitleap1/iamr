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
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ref"><?= Yii ::t('app','your_membership')?></label>
                    <select type="number" class="form-control" id="membership">
                        <option  selected value=1><?= Yii ::t('app','Standerd')?></option>
                        <option value=2><?= Yii ::t('app','Golden')?></option>
                        <option value=3><?= Yii ::t('app','Premium')?></option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="standerd"> <?= Yii ::t('app','Number').' '.Yii ::t('app','Standerd')?></label>
                    <input type="number" class="form-control" id="standerd" value=0  min=0>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="golden"> <?= Yii ::t('app','Number').' '.Yii ::t('app','Golden')?></label>
                    <input type="number" class="form-control" id="golden" value=0 min=0>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="premium"> <?= Yii ::t('app','Number').' '.Yii ::t('app','Premium')?></label>
                    <input type="number" class="form-control" id="premium" value=0  min=0>
                </div>
            </div>
            <div class="col-md-6">
                <div class="" style="font-size: 32px;">
                    <span class="glyphicon glyphicon-usd" > </span> <strong id="amount"> </strong>
                </div>
            </div>
        </div>
    </div>
</div>

<?php JSRegister::begin(); ?>
<script>
$(document).ready(function(){

         amount=calculat();
         $( "#amount" ).text( amount );

    $( "#standerd" ).change(function() {
        amount=calculat();
        $( "#amount" ).text( amount );
    });
    $( "#golden" ).change(function() {
        amount=calculat();
        $( "#amount" ).text( amount );
    });
    $( "#premium" ).change(function() {
        amount=calculat();
        $( "#amount" ).text( amount );
    });
    $( "#membership" ).change(function() {
        amount=calculat();
        $( "#amount" ).text( amount );
    });
});
function calculat() {
    var standerd = parseInt($("#standerd").val());
    var golden =parseInt($("#golden").val());
    var premium = parseInt($("#premium").val());
    var membership= parseInt($("#membership").val());
    if(membership==1 && (standerd + golden + premium)>100){
        return 'The Maximum referral must be  100';
    }
    return calculatStanderd(standerd,membership) + calculatGolden(golden,membership)+ calculatPremium(premium,membership); 


}

function calculatStanderd(number,membership){
  
    var perOne;    
    if(membership==1){
        perOne=20*0.10;
    } else if(membership==2){
        perOne=20*0.20;
    }else if(membership==3){
        perOne=20*0.50;
    }
    return perOne*number;
}
function calculatGolden(number,membership){
    var perOne;    
    if(membership==1){
        perOne=50*0.10;
    } else if(membership==2){
        perOne=50*0.20;
    }else if(membership==3){
        perOne=50*0.50;
    }
    return perOne*number;
}
function calculatPremium(number,membership){
    var perOne;    
    if(membership==1){
        perOne=100*0.10;
    } else if(membership==2){
        perOne=100*0.20;
    }else if(membership==3){
        perOne=100*0.50;
    }
    return perOne*number;
}


</script>
<?php JSRegister::end(); ?>