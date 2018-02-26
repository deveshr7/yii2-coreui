<?php
/*
 * KM websolution project.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* @var $this yii\web\View */
/* @var $dataProviderRecentUsers yii\data\ActiveDataProvider */

use yii\widgets\Pjax;

$this->title = 'Dashboard';
$this->params['bodyCssClass'] = 'dashboard';
?>

<div class="row">
    <div class="col-md-6">
        <?php
        Pjax::begin([
            'enablePushState' => false,
        ]);
        echo $this->render('_recent-users', ['dataProvider' => $dataProviderRecentUsers]);
        Pjax::end(); ?>
    </div>

    <div class="col-md-6">

    </div>
</div>
