<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Campaigns */
/* @var $form yii\widgets\ActiveForm */
?>
<?php /*
<div class="campaigns-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'users_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'country') ?>

    <?= $form->field($model, 'state') ?>

    <?= $form->field($model, 'university') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'video_url') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'days_run') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
 * 
 */?>
<div class="container_12 clearfix">
            <div class="grid_12">
            <div class="form login-form">
                <?php $form = ActiveForm::begin(['id' => 'form-camp']); ?>
                    <h3 class="rs title-form"></h3>
                    <div class="box-white">
                        <h4 class="rs title-box">Create Your Campaign</h4>
                        <p class="rs">Please fill details to continue.</p>
                        <div class="form-action">
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="title">
                                        <?= $form->field($model, 'title', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Title"]); ?>
                                    </label>
                                
                                    <label for="password">
                                    <?= $form->field($model, 'description', ['template'=> '{input}{error}'])->textarea(['class'=> 'txt fill-width', 'placeholder'=> "Describe your campaign"]); ?>
                                        </label>
                                </div>
                            </div>
                            <p class="rs ta-c">
                                <button class="btn btn-red btn-submit" type="submit">Submit</button>
                            </p>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        </div>