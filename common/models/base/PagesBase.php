<?php

namespace common\models\base;

use Yii;

/**
* This is the model class for table "pages".
*
    * @property integer $id
    * @property string $page_title
    * @property string $url_key
    * @property string $page_content
    * @property string $meta_title
    * @property string $meta_keyword
    * @property string $meta_description
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
*/
class PagesBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'pages';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['page_title', 'page_content'], 'required'],
            [['page_content', 'meta_description'], 'string'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['page_title', 'url_key', 'meta_title', 'meta_keyword'], 'string', 'max' => 255]
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => Yii::t('app', 'ID'),
    'page_title' => Yii::t('app', 'Page Title'),
    'url_key' => Yii::t('app', 'Url Key'),
    'page_content' => Yii::t('app', 'Page Content'),
    'meta_title' => Yii::t('app', 'Meta Title'),
    'meta_keyword' => Yii::t('app', 'Meta Keyword'),
    'meta_description' => Yii::t('app', 'Meta Description'),
    'status' => Yii::t('app', 'Status'),
    'created_at' => Yii::t('app', 'Created At'),
    'updated_at' => Yii::t('app', 'Updated At'),
];
}
}