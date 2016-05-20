<?php

namespace common\models\base;

use Yii;

/**
* This is the model class for table "users".
*
    * @property string $id
    * @property integer $role_id
    * @property string $facebook_id
    * @property string $twitter_id
    * @property string $badge_number
    * @property string $email
    * @property string $password
    * @property string $security_code
    * @property string $first_name
    * @property string $middle_name
    * @property string $last_name
    * @property string $dob
    * @property integer $gender
    * @property string $phone_number
    * @property string $address
    * @property string $city
    * @property string $website
    * @property integer $signin_with
    * @property string $last_login
    * @property integer $status
    * @property string $created_at
    * @property string $updated_at
*/
class UsersBase extends \yii\db\ActiveRecord
{
/**
* @inheritdoc
*/
public static function tableName()
{
return 'users';
}

/**
* @inheritdoc
*/
public function rules()
{
return [
            [['role_id', 'email', 'password', 'first_name'], 'required'],
            [['role_id', 'gender', 'signin_with', 'status'], 'integer'],
            [['dob', 'last_login', 'created_at', 'updated_at'], 'safe'],
            [['facebook_id', 'twitter_id', 'badge_number', 'email', 'password', 'first_name', 'middle_name', 'last_name', 'phone_number', 'address', 'city', 'website'], 'string', 'max' => 255],
            [['security_code'], 'string', 'max' => 10]
        ];
}

/**
* @inheritdoc
*/
public function attributeLabels()
{
return [
    'id' => 'ID',
    'role_id' => 'Role ID',
    'facebook_id' => 'Facebook ID',
    'twitter_id' => 'Twitter ID',
    'badge_number' => 'Badge Number',
    'email' => 'Email',
    'password' => 'Password',
    'security_code' => 'Security Code',
    'first_name' => 'First Name',
    'middle_name' => 'Middle Name',
    'last_name' => 'Last Name',
    'dob' => 'Dob',
    'gender' => 'Gender',
    'phone_number' => 'Phone Number',
    'address' => 'Address',
    'city' => 'City',
    'website' => 'Website',
    'signin_with' => 'Signin With',
    'last_login' => 'Last Login',
    'status' => 'Status',
    'created_at' => 'Created At',
    'updated_at' => 'Updated At',
];
}
}