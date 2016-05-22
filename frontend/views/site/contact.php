<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container_12 clearfix">
            <div class="grid_12">
            <div class="form login-form">
                <?php $form = ActiveForm::begin(['id' => 'form-contact']); ?>
                    <h3 class="rs title-form"></h3>
                    <div class="box-white" style="height: auto;">
                        <p class="rs">If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.</p>
                        <div class="form-action">
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="name">
                                        <?= $form->field($model, 'name', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Name"]); ?>
                                    </label>
                                    <label for="email">
                                        <?= $form->field($model, 'email', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Email"]); ?>
                                    </label>
                                    <label for="subject">
                                        <?= $form->field($model, 'subject', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Subject"]); ?>
                                    </label>
                                    <label for="body">
                                        <?= $form->field($model, 'body', ['template'=> '{input}{error}'])->textarea(['class'=> 'txt fill-width', 'placeholder'=> "Enter your concern"]); ?>
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