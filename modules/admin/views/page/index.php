<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_en',
            'title_de',
            'title_fr',
            'title_it',
            // 'title_ar',
            // 'description_en:ntext',
            // 'description_de:ntext',
            // 'description_fr:ntext',
            // 'description_it:ntext',
            // 'description_ar:ntext',
            // 'key_page',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
