<?php
namespace frontend\models;

use common\models\Users;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password, $reset_password;
    public $first_name, $last_name;
    public $country, $states, $city;

    
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
    public function rules()
    {
        return [
            //['username', 'filter', 'filter' => 'trim'],
            [['first_name', 'last_name', 'country', 'states'], 'required'],
            //['username', 'unique', 'targetClass' => '\common\models\Users', 'message' => 'This username has already been taken.'],
            //['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\Users', 'message' => 'This email address has already been taken.'],
            [['password', 'reset_password'], 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new Users();
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->role_id = 3;
            $user->country = $this->country;
            $user->states = $this->states;
            $user->city = $this->city;
            $user->password = $this->password;
            $user->status = '1';
            $user->created_at = date('Y-m-d h:i:s');
         
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}
