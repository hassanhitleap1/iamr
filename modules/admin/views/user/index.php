<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
                { return '<img  src="'.Yii::$app->request->baseUrl.'/'. $dataProvider->image_name.'" alt="Card image cap"  class="img-circle"  width="200" height="200">';
            }
                
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
                'template' => '{view} ',
            ],
        ],
    ]); ?>
</div>
