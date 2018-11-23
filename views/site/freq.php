 <?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'Freq');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $id=1;
 foreach ($freqs as $freq) : ?>
<p data-toggle="collapse" data-target="#<?= $freq->id_html ?>" 
style="color:blue; word-wrap: break-word;" >
<?= $id." . ".$freq['prg_' . Yii::$app->language];?>
</p>
<div id="<?= $freq->id_html ?>" class="collapse">
<?= $freq['collapse_' . Yii::$app->language]; ?>
<?php $id+=1;?>
</div>
<hr>
<?php endforeach; ?>