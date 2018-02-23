<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php
$url = Url::to(['latest-users']);
$header = '<tr><th>ID</th>';
$header .= '<th>' . Yii::t('app', 'Username') . '</th>';
$header .= '<th>' . Yii::t('app', 'Email') . '</th>';
$header .= '<th>' . Yii::t('app', 'Created at') . '</th></tr>';
  
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => 'div',
        'class' => 'box box-latest-users',
    ],
    'layout' => '<div class="box-header"><h3 class="box-title">'. Yii::t('app', 'Latest Users') . '</h3><a href="' . $url . '" class="box-refresh"> <i class="fa fa-refresh"></i></a><div class="box-tools">{pager}</div></div>'
                .'<div class="box-body"><table class="table"><tbody>'. $header . '{items}</tbody></table></div>',
    'itemView' => function($model, $key, $index, $widget) {
        $out =  "<tr><td>$model->id</td>";
        $out .= "<td>" . Html::encode($model->username) . "</td>";
        $out .=  "<td>" . Html::encode($model->email) . "</td>";
        $out .=  "<td>" . Yii::$app->formatter->asDate($model->created_at) . "</td></tr>";
           return $out; 
        },
    'pager' => [
         'options' => ['class' => 'pagination pagination-sm no-margin pull-right']       
    ],
]);
         
?>
