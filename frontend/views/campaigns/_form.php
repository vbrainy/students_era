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
                    <div class="box-white" style="height: auto;">
                        <h4 class="rs title-box">Create Your Campaign</h4>
                        <p class="rs">Please fill details to continue.</p>
                        <div class="form-action">
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="first_name">
                                        <?= $form->field($model, 'first_name', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "First Name"]); ?>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="last_name">
                                    <?= $form->field($model, 'last_name', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Last Name"]); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="country">
                                    <?= $form->field($model, 'country', ['template'=> '{input}{error}'])->dropDownList(\common\models\Country::getAllCountry(),['class'=> 'txt fill-width']); ?>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="state">
                                    <?= $form->field($model, 'state', ['template'=> '{input}{error}'])->dropDownList(\common\models\States::getAllStatesByCountry(4),['class'=> 'txt fill-width']); ?>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="title">
                                        <?= $form->field($model, 'title', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Title"]); ?>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="university">
                                    <?= $form->field($model, 'university', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "University"]); ?>
                                        </label>
                                </div>
                            </div>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="description">
                                    <?= $form->field($model, 'description', ['template'=> '{input}{error}'])->textarea(['class'=> 'txt fill-width', 'placeholder'=> "Describe your campaign"]); ?>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="video_url">
                                    <?= $form->field($model, 'video_url', ['template'=> '{input}{error}'])->fileInput(['class'=> 'txt fill-width']); ?>
                                        </label>
                                    
                                </div>
                            </div>
                            <p class="rs ta-l">
                                <button class="btn btn-red btn-submit" type="submit">Submit</button>
                            </p>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        </div>