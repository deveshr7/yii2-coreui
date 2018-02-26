<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var $this     yii\web\View
 * @var $content string
 */

use dektrium\rbac\widgets\Menu;
?>

<div class="card">
    <div class="card-header">
        <?= Menu::widget([
            'options' => ['class' => 'nav-pills card-header-pills']
        ]) ?>
    </div>
    <div class="card-body">
        <?= $content ?>
    </div>
</div>
