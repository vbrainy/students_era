<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="news-form">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?= Html::encode($this->title) ?></div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <?php $form = ActiveForm::begin(['options'=> ['class'=> 'form-horizontal']]); ?>
                <?= $form->field($model, 'title', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->textInput(['maxlength' => 255, 'class'=> 'span6 m-wrap']) ?>
                <?= $form->field($model, 'content', ['template' => '<div class="control-group">{label}<div class="controls">{input}<div class="help-block"></div></div></div>'])->textInput(['maxlength' => 255, 'class'=> 'span6 m-wrap']) ?>
                <?php /* $form->field($model, 'status', ['template' => '<div class="control-group">{label}<div class="controls">{input}</div></div>'])->textInput() ?>
                <?= $form->field($model, 'created_at')->textInput() ?>
                <?= $form->field($model, 'updated_at')->textInput() */ ?>
                <div class="form-actions">
                    <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->urlManager->createUrl(['news/index']), ['class' => 'btn default']) ?>
                    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
