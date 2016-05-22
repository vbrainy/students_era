<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "cms_pages".
 *
 * @property \MongoId|string $_id
 * @property mixed $key
 * @property mixed $title
 * @property mixed $content
 */
class CmsPages extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'cms_pages';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'key',
            'title',
            'content',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'title', 'content'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'key' => 'Key',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
