<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container_12 clearfix">
            <div class="grid_12">
            <div class="form login-form">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <h3 class="rs title-form"></h3>
                    <div class="box-white" style="height: auto;">
                        <h4 class="rs title-box">New to <?= Yii::getAlias('@site_title') ?></h4>
                        <p class="rs">A <?= Yii::getAlias('@site_title') ?> account is required to continue.</p>
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
                                    <label for="email">
                                    <?= $form->field($model, 'email', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Email"]); ?>
                                    </label>
                                </div>
                                <div class="col">
                                    <label for="country">
                                    <?= $form->field($model, 'country', ['template'=> '{input}{error}'])->dropDownList(\common\models\Country::getAllCountry(),['class'=> 'txt fill-width']); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="states">
                                    <?= $form->field($model, 'states', ['template'=> '{input}{error}'])->dropDownList(\common\models\States::getAllStatesByCountry(4),['class'=> 'txt fill-width']); ?>
                                        </label>
                                </div>
                                <div class="col">
                                    <label for="city">
                                    <?= $form->field($model, 'city', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> 'City']); ?>
                                    </label>
                                </div>
                            </div>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <label for="password">
                                    <?= $form->field($model, 'password', ['template'=> '{input}{error}'])->passwordInput(['class'=> 'txt fill-width', 'placeholder'=> "Password"]); ?>
                                        </label>
                                </div>
                                <div class="col">
                                    <label for="reset_password">
                                    <?= $form->field($model, 'reset_password', ['template'=> '{input}{error}'])->passwordInput(['class'=> 'txt fill-width', 'placeholder'=> "Re-enter Password"]); ?>
                                        </label>
                                </div>
                            </div>
                            <p class="rs pb10">By signing up, you agree to our <a href="#" class="fc-orange">terms of use</a> and <a href="#" class="fc-orange">privacy policy</a>.</p>
                            <p class="rs ta-l">
                                <button class="btn btn-red btn-submit" type="submit">Register</button>
                            </p>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        </div>
    



