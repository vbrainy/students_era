<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-index">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?= Html::encode($this->title) ?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">

            <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>

            <?= $form->field($model, 'email', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'password', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->passwordInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'first_name', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->textInput(['maxlength' => 255]) ?>

            <?= $form->field($model, 'last_name', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->textInput(['maxlength' => 255]) ?>
            <?= $form->field($model, 'gender', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->dropDownList(['Male' => 'Male', 'Female' => 'Female'], ['prompt' => 'Select']) ?>
            <?= $form->field($model, 'phone_number', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->textInput(['maxlength' => 255]) ?>

            <div class="form-actions">

                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->urlManager->createUrl(['users/index']), ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
