<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Memberships */

$this->title = 'Create Memberships';
$this->params['breadcrumbs'][] = ['label' => 'Memberships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberships-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
