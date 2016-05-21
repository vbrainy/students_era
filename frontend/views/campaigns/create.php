<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Campaigns */

$this->title = 'Create Campaigns';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaigns-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
