<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Referral';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-referral">
    <div class="row">
        <div class="col-md-6">
        <h2>Your Balance </h1>
        <span class="glyphicon glyphicon-usd gi-lg"> <?= $balance->balance?></span>
        </div>
        <div class="col-md-6">
            <div class="referral">
                <div class="form-group">
                    <label for="comment">Referral: html</label>
                    <textarea class="form-control" rows="2" id="comment"  >
                       <?= $referralCode->html_code ?>
                    </textarea>
                </div>
                <div class="form-group">
                        <label for="comment">Referral: script</label>
                        <textarea class="form-control" rows="2" id="comment">
                             <?= $referralCode->js_code ?>
                        </textarea>
                </div>                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="user-referaal">
            <table class="table">
                <thead>
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Default</td>
                    <td>Defaultson</td>
                    <td>def@somemail.com</td>
                </tr>      
                <tr class="success">
                    <td>Success</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                </tr>
                <tr class="danger">
                    <td>Danger</td>
                    <td>Moe</td>
                    <td>mary@example.com</td>
                </tr>
                <tr class="info">
                    <td>Info</td>
                    <td>Dooley</td>
                    <td>july@example.com</td>
                </tr>
                <tr class="warning">
                    <td>Warning</td>
                    <td>Refs</td>
                    <td>bo@example.com</td>
                </tr>
                <tr class="active">
                    <td>Active</td>
                    <td>Activeson</td>
                    <td>act@example.com</td>
                </tr>
                </tbody>
            </table>
        </div> 
    </div>      
</div>
<img  onclick='openInNewTab();' src='https://static-ca.ebgames.ca/images/products/606502/3max.jpg'  style='width: 466px; height: 45px;' id='link' /><script>
    function openInNewTab() 
    {
        var url='https://stackoverflow.com/posts/11384018/revisions';
        var win = window.open(url, '_blank');
        win.focus();
    }
    </script> 