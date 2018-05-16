<?php
/**
 * KM Websolutions Projects
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2010 KM Websolutions
 * @license http://www.yiiframework.com/license/
 */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use kmergen\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<?php
Yii::beginProfile('ListView');
$header = '<th>ID</th>';
$header .= '<th>' . Yii::t('app', 'Fische Art') . '</th>';
$header .= '<th>' . Yii::t('app', 'Title') . '</th>';
$header .= '<th>' . Yii::t('app', 'Created at') . '</th>';
?>
<div class="card">
    <div class="card-header clearfix">
        <h3 class="float-left"><?= Yii::t('app', 'Recent Fische ListView') ?></h3>
        <div class="float-right"><a href="<?= Url::to(['recent-fische-listview']) ?>"><?= Yii::t('backend', 'Refresh') ?> <i
                        class="fa fa-refresh"></i></a></div>
    </div>
    <div class="card-body">
        <?php
        echo ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '<table class="table"><thead><tr>' . $header . '</tr></thead><tbody>{items}</tbody></table>{pager}</div>',
            'pager' => ['class' => LinkPager::class],
            'itemView' => function ($model, $key, $index, $widget) {
                $out = "<tr><td>$model->id</td>";
                $out .= "<td>" . Html::encode($model->fisch_art) . "</td>";
                $out .= "<td>" . Html::encode($model->title) . "</td>";
                $out .= "<td>" . Yii::$app->formatter->asDate($model->created_at) . "</td></tr>";
                return $out;
            }
        ]); ?>
    </div>
</div>
<?php Yii::endProfile('ListView') ?>