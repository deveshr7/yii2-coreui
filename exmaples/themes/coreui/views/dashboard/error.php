<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
//$this->context->layout = 'blank';
?>
<div class="dashboard-error error-page">
    <?php if ($exception->statusCode < 500): ?>
        <h2 class="headline text-yellow"><?= $exception->statusCode ?></h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Something went wrong.</h3>
            <p>
                <?= nl2br(Html::encode($message)) ?>
                You may <?= Html::a('return to dashboard', ['/']) ?>.
            </p>
        </div>
    <?php else: ?>
        <h2 class="headline text-red"><?= $exception->statusCode ?></h2>
        <div class="error-content">
            <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

            <p>
                <?= nl2br(Html::encode($message)) ?>
                We will work on fixing that right away.
                You may <?= Html::a('return to dashboard', ['/']) ?>.
            </p>
        </div>
    <?php endif; ?>
</div>
