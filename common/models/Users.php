<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for collection "users".
 *
 * @property \MongoId|string $_id
 * @property mixed $email
 * @property mixed $password
 * @property mixed $first_name
 * @property mixed $last_name
 * @property mixed $dob
 * @property mixed $gender
 * @property mixed $phone_number
 * @property mixed $status
 * @property mixed $created_at
 * @property mixed $updated_at
 */
class Users extends \yii\mongodb\ActiveRecord implements IdentityInterface
{

    /**
     * returns the primary key field for this model
     */
    // public static function primaryKey()
    // {
    //     return NULL;
    // }
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'role_id',
            'email',
            'password',
            'first_name',
            'last_name',
            'dob',
            'gender',
            'phone_number',
            'status',
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
            [['email', 'password', 'first_name', 'last_name', 'dob', 'gender', 'phone_number', 'status', 'created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id'          => 'ID',
            'role_id'      => 'Rold ID',
            'email'        => 'Email',
            'password'     => 'Password',
            'first_name'   => 'First Name',
            'last_name'    => 'Last Name',
            'dob'          => 'Dob',
            'gender'       => 'Gender',
            'phone_number' => 'Phone Number',
            'status'       => 'Status',
            'created_at'   => 'Created At',
            'updated_at'   => 'Updated At',
        ];
    }

    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS* */

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire    = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts     = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time())
        {
            // token expired
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * Count  all users By users status.
     * @status : passed multiple status in comma serperetor
     * @is_logged_in : check user is logged in ya not
     */
    public static function countusersbystatus($status = false, $role_id = false, $is_logged_in = false)
    {
        $condition = '';
        if ($status != '')
        {
            $condition .= "status IN ($status)";
        }
        if (!empty($role_id))
        {
            $condition .= (!empty($condition)) ? ' && ' : '';
            $condition .= "role_id = $role_id";
        }
        //$condition = "status IN ($status) && role_id = $role_id";
        if (!empty($is_logged_in))
        {
            $condition .= (!empty($condition)) ? ' && ' : '';
            $condition .= "is_logged_in  = $is_logged_in";
        }
        return Users::find()
                        ->where($condition)
                        ->count();
    }

    public static function GetUserName()
    {

    }

}
