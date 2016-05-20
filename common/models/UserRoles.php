<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "user_roles".
 *
 * @property \MongoId|string $_id
 * @property mixed $role_name
 * @property mixed $role_description
 */
class UserRoles extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'user_roles';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'role_name',
            'role_description',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'role_description'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'role_name' => 'Role Name',
            'role_description' => 'Role Description',
        ];
    }
}
