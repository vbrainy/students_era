<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\Common;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left"><?= Html::encode($this->title) ?></div>
        <div class="pull-right"><?= Html::a(Yii::t('app', '<i class="icon-plus"></i> Add User'), ['create'], ['class' => 'btn btn-success']) ?></div>
    </div>
    <div class="block-content">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            // 'filterModel'  => $searchModel,
            'layout'       => "<div class='table-scrollable'>{items}</div>\n<div class='col-md-5 col-sm-12'><div class='row'>{summary}</div></div>\n<div class='col-md-7 col-sm-12'><div class='row'>{pager}</div></div>",
            'columns'      => [
                [
                    'headerOptions'  => ["style" => "width:30%;"],
                    'contentOptions' => ['style' => "width:30%;"],
                    'attribute'      => 'email',
                ],
                [
                    'headerOptions'  => ["style" => "width:30%;"],
                    'contentOptions' => ['style' => "width:30%;"],
                    'attribute'      => 'first_name',
                ],
                [
                    'headerOptions'  => ["style" => "width:15%;"],
                    'contentOptions' => ['style' => "width:15%;"],
                    'attribute'      => 'gender',
                ],

                [
                    'header'        => 'Actions',
                    'class'         => 'yii\grid\ActionColumn',
                    'headerOptions' => ["style" => "width:45%;"],
                    'template'      => '{update}{delete}',
                    'buttons'       => [
                        'update' => function ($url, $model)
                        {
                            $url = Yii::$app->urlManager->createUrl(['users/update', 'id' => (string) $model['_id']]);
                            return Common::template_update_button($url, $model);
                        },
                        'delete'        => function ($url, $model)
                        {
                            $url = Yii::$app->urlManager->createUrl(['users/delete', 'id' => (string) $model['_id']]);
                            return Common::template_delete_button($url, $model);
                        },
                    ]
                ]
            ],
        ]);
        ?>
    </div>
</div>
