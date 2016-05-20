<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmailFormat */

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => 'Email Formats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-format-create">

    <!--h1><?= Html::encode($this->title) ?></h1-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
