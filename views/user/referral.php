<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Referral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-referral">
    <div class="row">
        <div class="col-md-6">
        <h2><?= Yii::t('app','Your_Balance');?></h1>
        <span class="glyphicon glyphicon-usd gi-lg"> <?= $balance->balance?></span>
        </div>
        <div class="col-md-6">
            <div class="referral">
                <div class="form-group">
                    <label for="comment">Referral: html</label>
                    <textarea class="form-control" rows="2" id="comment"><?= $referralCode->html_code ?></textarea>
                </div>
                <div class="form-group">
                        <label for="comment">Referral: script</label>
                        <textarea class="form-control" rows="2" id="comment"><?= $referralCode->js_code ?></textarea>
                </div>                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="user-referaal">
            <table class="table">
                <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Date Register</th>
                    <th>Activation</th>
                    <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty( $referalUsers)):?>
                    <?php foreach($referalUsers as $referalUser):?>
                    <tr>
                        <td><?= $referalUser->full_name;?></td>
                        <td><?=date('Y-m-d', $referalUser->created_at); ?></td>
                        <td><?= $referalUser->status? "Active": "Disactive"  ?></td>
                        <td><?= $referalUser->status? "Pay": "Not Pay"  ?></td>
                    </tr>
                    <?php endforeach;?>
                <?php endif;?>      
                </tbody>
            </table>
        </div> 
    </div>      
</div>
