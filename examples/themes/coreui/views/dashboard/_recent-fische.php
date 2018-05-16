<?php
/**
 * KM Websolutions Projects
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2010 KM Websolutions
 * @license http://www.yiiframework.com/license/
 */

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;
use yii\grid\GridView;
use kmergen\widgets\LinkPager;

?>
<?php Yii::beginProfile('GridView') ?>
<div class="card">
    <div class="card-header clearfix">
        <h3 class="float-left"><?= Yii::t('app', 'Recent Fische') ?></h3>
        <div class="float-right"><a href="<?= Url::to(['recent-fische']) ?>"><?= Yii::t('backend', 'Refresh') ?> <i
                        class="fa fa-refresh"></i></a></div>
    </div>
    <div class="card-body">
        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'pager' => ['class' => LinkPager::class],
            'tableOptions' => ['class' => 'table'],
            'summary' => '',
            'columns' => [
                'id',
                'fisch_art',
                'created_at:date',
                'title'
            ],
        ]);
        ?>
    </div>
</div>
<?php Yii::endProfile('GridView') ?>