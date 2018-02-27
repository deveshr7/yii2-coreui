<?php
/**
 * KM Websolutions Projects
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2010 KM Websolutions
 * @license http://www.yiiframework.com/license/
 */

/* @var $this yii\web\View */

/* @var $dataProviderRecentUsers yii\data\ActiveDataProvider */


/*
    If you want to show recent users on your dashboard create an action in backend\controllers\DashboardController
    at the

     public function actionRecentUsers()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => User::find()->orderBy('created_at desc'),
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => false
        ]);

        return $this->renderAjax('_recent-users', [
            'dataProvider' => $dataProvider,
        ]);
    }
*/

//Here begins the view content
/*
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
        //other content or widget
    </div>
</div>
*/