<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Users;

/**
 * UsersSearch represents the model behind the search form about `common\models\Users`.
 */
class UsersSearch extends Users
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'gender', 'signin_with', 'status'], 'integer'],
            [['facebook_id', 'twitter_id', 'badge_number', 'email', 'password', 'security_code', 'first_name', 'middle_name', 'last_name', 'dob', 'phone_number', 'address', 'city', 'website', 'last_login', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query        = Users::find();
        //$query->where("id!=1");
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate())
        {
            // uncomment the following line if you do not want to any records when validation fails
            $query->where('_id!=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id'          => $this->id,
            'role_id'     => $this->role_id,
            'dob'         => $this->dob,
            'gender'      => $this->gender,
            'signin_with' => $this->signin_with,
            'last_login'  => $this->last_login,
            'status'      => $this->status,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'facebook_id', $this->facebook_id])
                ->andFilterWhere(['like', 'twitter_id', $this->twitter_id])
                ->andFilterWhere(['like', 'badge_number', $this->badge_number])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'password', $this->password])
                ->andFilterWhere(['like', 'security_code', $this->security_code])
                ->andFilterWhere(['like', 'first_name', $this->first_name])
                ->andFilterWhere(['like', 'middle_name', $this->middle_name])
                ->andFilterWhere(['like', 'last_name', $this->last_name])
                ->andFilterWhere(['like', 'phone_number', $this->phone_number])
                ->andFilterWhere(['like', 'address', $this->address])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'website', $this->website]);

        return $dataProvider;
    }

}
