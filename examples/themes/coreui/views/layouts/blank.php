<?php

/**
 * This layout is the skeleton for login and registration page and for all other
 * pages who don't need header and sidebar menu.
 */

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?= Url::to('@web/themes/coreui/img/favicon.png') ?>">
    <?= Html::cssFile(YII_DEBUG ? '@web/themes/coreui/css/app.css' : '@web/themes/coreui/css/app.min.css?v=' . filemtime(Yii::getAlias('@webroot/themes/coreui/css/app.min.css'))) ?>
    <?php $this->head() ?>
</head>
<?php
?>
<body class="blank-page<?= isset($this->params['bodyClass']) ? " {$this->params['bodyClass']}" : '' ?>">
<?php $this->beginBody() ?>
<div class="wrapper">
    <?= $content ?>
</div>
<?= Html::jsFile(YII_DEBUG ? '@web/themes/coreui/js/app.js' : '@web/themes/coreui/js/app.min.js?v=' . filemtime(Yii::getAlias('@webroot/themes/coreui/js/app.min.js'))) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
