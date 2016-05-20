<?php

namespace common\models;

use Yii;

/**
 * This is the model class for collection "user_rules".
 *
 * @property \MongoId|string $_id
 * @property mixed $role_id
 * @property mixed $privilieges_controller
 * @property mixed $privilieges_actions
 * @property mixed $permission
 * @property mixed $permission_type
 */
class UserRules extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'user_rules';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'role_id',
            'privilieges_controller',
            'privilieges_actions',
            'permission',
            'permission_type',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'privilieges_controller', 'privilieges_actions', 'permission', 'permission_type'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'role_id' => 'Role ID',
            'privilieges_controller' => 'Privilieges Controller',
            'privilieges_actions' => 'Privilieges Actions',
            'permission' => 'Permission',
            'permission_type' => 'Permission Type',
        ];
    }
}
