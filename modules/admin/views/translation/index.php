<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\TranslationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Translations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'payment_id',
            [
                'attribute'=>'user_id',
                'value'=> 'user.full_name',
            ],
            'hash',
            [
                'attribute' => 'completed',
                'value' => function($dataProvider)
                {
                    return $dataProvider->completed? 'Completed': 'Not Completed';
                },
                'filter'=>[1=> 'Completed',0=> 'Not Completed']
            ],

         
        ],
    ]); ?>
</div>
