<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CmsPagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cms Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cms-pages-index">
<div class="container_12">
    <h1><?= Html::encode($data['title']) ?></h1>
    <p><?php echo $data['content']; ?></p>
    </div>
</div>
