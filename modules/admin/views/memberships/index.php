<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MembershipsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memberships';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberships-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Memberships', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_en',
            'name_ar',
            'name_it',
            'name_fr',
            //'name_de',
            //'features_en',
            //'features_ar',
            //'features_de',
            //'features_fr:ntext',
            //'features_it:ntext',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
