<?php
/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use kmergen\coreui\widgets\Alert;
use kmergen\coreui\widgets\Sidebar;
use kmergen\coreui\widgets\Breadcrumbs;

$user = Yii::$app->getUser()->getIdentity();
$profile = $user->profile;

$items = [
    ['label' => 'Dashboard', 'icon' => 'fa fa-address-book-o', 'url' => ['/dashboard']],
    [
        'label' => 'User',
        'url' => '#',
        'items' => [
            ['label' => 'List', 'icon' => 'fa fa-users', 'url' => ['/user/admin']],
            ['label' => 'Add', 'icon' => 'fa fa-user-plus', 'url' => ['/user/admin/create']],
        ],
    ],
];
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
<body class="app header-fixed<?= isset($this->params['bodyCssClass']) ? " {$this->params['bodyCssClass']}" : '' ?>">
<?php $this->beginBody() ?>
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="<?= $profile->getAvatarUrl() ?>" class="img-avatar"
                     alt="admin@bootstrapmaster.com">
                <span class="d-md-down-none"><?= $user->username ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <?= Html::beginForm(['/user/security/logout'], 'post')
                . Html::submitButton(
                    Yii::t('app', 'Logout') . '(' . Yii::$app->user->identity->username . ')',
                    ['class' => 'dropdown-item btn btn-link logout']
                )
                . Html::endForm(); ?>
            </div>
        </li>
    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <?=
            Sidebar::widget([
                'options' => ['id' => 'side-menu', 'class' => 'nav'],
                'encodeLabels' => false,
                'items' => $items,
            ])
            ?>

        </nav>
    </div>
    <main class="main">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'linksAtRight' => isset($this->params['breadcrumbsRight']) ? $this->params['breadcrumbsRight'] : [],
        ])
        ?>

        <div class="container-fluid content-wrapper">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>
</div>
<footer class="app-footer">
    &copy; <?= date('Y') ?> <?= Html::a(Yii::$app->name, ['/']) ?>

    <span class="float-right">Made by <?= $user->username . ($profile->name == null || $profile->name == '' ? '' : ' (' . $profile->name) . ')' ?>
        .</span>
</footer>
<?= Html::jsFile(YII_DEBUG ? '@web/themes/coreui/js/app.js' : '@web/themes/coreui/js/app.min.js?v=' . filemtime(Yii::getAlias('@webroot/themes/coreui/js/app.min.js'))) ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
