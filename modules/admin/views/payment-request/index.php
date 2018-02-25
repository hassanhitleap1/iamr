<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\PaymentRequest;
/* @var $this yii\web\View */
/* @var $searchModel app\models\admin\PaymentRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payment Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'value',
            'user_id',
            'paypal',
            'western_union_full_name',
            'country',
             'full_address',
             'create_at',

             [
                 'attribute'=> 'accept',
                 'value'=>function($dataProvider) {return $dataProvider->accept?'Accept':'Not Accept';},
                 'filter'=>[PaymentRequest::ACCPET_PAYMENT=> 'Accept', 
                  PaymentRequest::NOT_ACCPET_PAYMENT => 'Not Accept'],
             ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{accept}',
                'buttons' =>
                    [
                        'accept' => function ($url, $model) {
                            if ($model->accept) {
                                return Html::a(
                                '<span class="glyphicon glyphicon-remove-sign" style="color:red;" ></span>',
                                $url,
                                [
                                'title' => 'Accept',
                                'data' =>
                                [
                                'confirm' => 'Are you sure you want to Disactive this user?', 'method' => 'post'],
                                'data-ajax' => '1'
                                ] );
                                } else {
                                    return Html::a(
                                    '<span class="glyphicon glyphicon-ok-sign" ></span>',
                                    $url,
                                    [
                                        'title' => 'Accept',
                                        'data' =>
                                        ['confirm' => 'Are you sure you want to active this user?', 'method' => 'post'],
                                        'data-ajax' => '1'
                                        ] );}
                                    },
                                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
