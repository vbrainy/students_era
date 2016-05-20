<?php

namespace common\models;

use Yii;

class News extends \common\models\base\NewsBase
{
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'news';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
                [['title', 'content'], 'required'],
                [['content'], 'string'],
                [['status'], 'integer'],
                [['created_at', 'updated_at'], 'safe'],
                [['title'], 'string', 'max' => 255]
            ];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'content' => Yii::t('app', 'Content'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}