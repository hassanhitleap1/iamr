<?php

use app\components\Membership;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'full_name',
            'about_me:ntext',
            [
                'attribute'=>'image_name',
                'format' => 'raw',
                'value'=>function ($dataProvider) 
                { return '<img  src="'.Yii::$app->request->baseUrl.'/'. 
                    $dataProvider->image_name.'" alt="Card image cap"  class="img-circle" 
                     width="100" height="100">';
            }
                
            ],
            [
                'attribute' => 'membership_id',
                'format' => 'raw',
                'value' => function ($dataProvider) {
                    if($dataProvider->membership_id>0){
                     $membership = new Membership($dataProvider->membership_id);
                     $name= $membership->name;
                    }else {
                    $name = "no membership";
                    }
               
                return $name;
                },
            'filter' => [
                    0 => "no membership",
                    1 => "Standerd",  
                    2 => "Golden", 
                    3 => "Premium"
                ]
            ],
            'email:email',
            'ref',
            'created_at',
            [
                'attribute'=>'status',
                'value'=>function ($dataProvider) { return ($dataProvider->status)? 
                    "Active":"DisActive";},
                'filter'=>[User::STATUS_ACTIVE=>"Active",User::STATUS_DELETED=>"DisActive"]
            ],
            
           

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{acrivation}',
                'buttons' => 
                [
                    'acrivation' => function ($url, $model) 
                    {
                        if($model->status){
                            return Html::a(
                                '<span class="glyphicon glyphicon-remove-sign" style="color:red;" ></span>',
                                $url,
                                [
                                    'title' => 'Active',
                                    'data' =>
                                        ['confirm' => 'Are you sure you want to Disactive this user?', 'method' => 'post'],
                                    'data-ajax' => '1'
                                ]
                            );   

                        }else{
                            return  Html::a(
                                '<span class="glyphicon glyphicon-ok-sign" ></span>', 
                            $url, ['title' =>'Active', 
                            'data' => 
                            ['confirm' => 'Are you sure you want to active this user?', 'method' => 'post'], 
                            'data-ajax' => '1']) ;
                            }
                    },
                  
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>


</div>
