<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\components\Common;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?= Html::encode($this->title) ?></div>
        <div class="pull-right"><?= Html::a(Yii::t('app', '<i class="icon-plus"></i> Add Page'), ['create'], ['class' => 'btn btn-success']) ?></div>
    </div>
    <div class="block-content">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "<div class='table-scrollable'>{items}</div>\n<div class='col-md-5 col-sm-12'><div class='row'>{summary}</div></div>\n<div class='col-md-7 col-sm-12'><div class='row'>{pager}</div></div>",
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'headerOptions' => ["style" => "width:20%;"],
                'contentOptions'=> ['style'=> "width:20%;"],
                'attribute' => 'page_title',
            ],
            [
                'headerOptions' => ["style" => "width:20%;"],
                'contentOptions'=> ['style'=> "width:20%;"],
                'attribute' => 'url_key',
            ],
            [
                'headerOptions' => ["style" => "width:20%;"],
                'contentOptions'=> ['style'=> "width:20%;"],
                'attribute' => 'meta_title',
            ],
            // 'meta_keyword',
            // 'meta_description:ntext',
            // 'status',
            // 'created_at',
            // 'updated_at',
            [
                'header' => 'Actions',
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ["style" => "width:40%;"],
                'contentOptions' => ["style" => "width:40%;"],
                'template' => '{update}{delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Common::template_update_button($url, $model);
                    },
                    'delete' => function ($url, $model) {
                        return Common::template_delete_button($url, $model);
                    },
                ]
            ]
        ],
    ]); ?>
    </div>
</div>
