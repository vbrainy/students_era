<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "campaigns".
 *
 * @property \MongoId|string $_id
 * @property mixed $users_id
 * @property mixed $title
 * @property mixed $country
 * @property mixed $state
 * @property mixed $university
 * @property mixed $description
 * @property mixed $video_url
 * @property mixed $status
 * @property mixed $days_run
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Campaigns extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return ['students_era', 'campaigns'];
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'users_id',
            'title',
            'country',
            'state',
            'university',
            'description',
            'video_url',
            'status',
            'days_run',
            'created_at',
            'updated_at',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['users_id', 'title', 'country', 'state', 'university', 'description', 'video_url', 'status', 'days_run', 'created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'users_id' => 'Users ID',
            'title' => 'Title',
            'country' => 'Country',
            'state' => 'State',
            'university' => 'University',
            'description' => 'Description',
            'video_url' => 'Video Url',
            'status' => 'Status',
            'days_run' => 'Days Run',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
