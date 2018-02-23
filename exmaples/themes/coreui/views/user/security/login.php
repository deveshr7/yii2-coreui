<?php
/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module           $module
 */
$this->context->layout = '@app/themes/coreui/views/layouts/blank';
$this->title = Yii::t('user', 'Sign in');
$this->params['bodyClass'] = 'app flex-row align-items-center';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-4">
                    <div class="card-block">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <?php
                        $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'enableAjaxValidation' => true,
                                'enableClientValidation' => false,
                                'validateOnBlur' => false,
                                'validateOnType' => false,
                                'validateOnChange' => false,
                            ])
                        ?>

                        <?= $form->field($model, 'login', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>

                        <?= $form->field($model, 'password', ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']])->passwordInput()->label(Yii::t('user', 'Password')) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4']) ?>

                        <?= Html::submitButton(Yii::t('user', 'Sign in'), ['class' => 'btn btn-primary btn-block', 'tabindex' => '3']) ?>

                        <?php ActiveForm::end(); ?>

                        <?=
                        Connect::widget([
                            'baseAuthUrl' => ['/user/security/auth'],
                        ])
                        ?>

                    </div>
                </div>
                <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-block text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







