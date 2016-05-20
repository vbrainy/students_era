<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */

$this->title = 'Update Pages: ' . ' ' . $model->page_title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
