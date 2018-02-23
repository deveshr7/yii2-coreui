<?php
/* 
 * KM websolution project.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
    <div class="col-3">
        Guten Tag
    </div>
    <div class="col-3">
        Guten Abend
    </div>
</div>

<a href="<?= Yii::$app->urlManagerFrontend->createUrl('site/index') ?>">Create Url</a><br>
<a href="<?= Yii::$app->urlManagerFrontend->createAbsoluteUrl('site/index') ?>">Create Absolute Url</a>