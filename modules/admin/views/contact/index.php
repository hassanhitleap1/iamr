<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            'email:email',
            'subject',
            'body:ntext',
            [
                'attribute' => 'image_prime',
                'format' => 'raw',
                'value'=> function ($data) {
                    return   Html::img('@web/' . $data->imageContact['image_path'], ['class' => '', 'style' => 'width: 144px;
                    height: 124px;']) ;
                   
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {complete}',
                'buttons' => [
                    'complete' => function ($url,$model) {
                        if(!$model->complete){
                            return Html::a(
                                '<span class="glyphicon glyphicon-ok" style="color:red;"></span> ',
                                $url, 
                                [
                                    'data' => [
                                        'confirm' => 'are you sure.',
                                        'method' => 'post',
                                    ],
                                ]
                            ); 
                        }
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>


