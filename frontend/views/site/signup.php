<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php /*
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            
            

        </div>
    </div>
    
</div>
 * 
 */
?>
<div class="container_12 clearfix">
            <div class="grid_12">
            <div class="form login-form">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <h3 class="rs title-form"></h3>
                    <div class="box-white">
                        <h4 class="rs title-box">New to <?= Yii::getAlias('@site_title') ?></h4>
                        <p class="rs">A <?= Yii::getAlias('@site_title') ?> account is required to continue.</p>
                        <div class="form-action">
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                <?= $form->field($model, 'first_name', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "First Name"]); ?>
                                
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'last_name', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Last Name"]); ?>
                                </div>
                            </div>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                <?= $form->field($model, 'email', ['template'=> '{input}{error}'])->textInput(['class'=> 'txt fill-width', 'placeholder'=> "Email"]); ?>
                                
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'password', ['template'=> '{input}{error}'])->passwordInput(['class'=> 'txt fill-width', 'placeholder'=> "Password"]); ?>
                                </div>
                            </div>
                            <div class="wrap-2col clearfix">
                                <div class="col">
                                    <?= $form->field($model, 'password', ['template'=> '{input}{error}'])->passwordInput(['class'=> 'txt fill-width', 'placeholder'=> "Password"]); ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'reset_password', ['template'=> '{input}{error}'])->passwordInput(['class'=> 'txt fill-width', 'placeholder'=> "Re-enter Password"]); ?>
                                </div>
                            </div>
                            <p class="rs pb10">By signing up, you agree to our <a href="#" class="fc-orange">terms of use</a> and <a href="#" class="fc-orange">privacy policy</a>.</p>
                            <p class="rs ta-c">
                                <button class="btn btn-red btn-submit" type="submit">Register</button>
                            </p>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        </div>
    



