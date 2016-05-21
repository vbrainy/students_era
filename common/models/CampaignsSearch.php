<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Campaigns;

/**
 * CampaignsSearch represents the model behind the search form about `common\models\Campaigns`.
 */
class CampaignsSearch extends Campaigns
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['_id', 'users_id', 'title', 'country', 'state', 'university', 'description', 'video_url', 'status', 'days_run', 'created_at', 'updated_at'], 'safe'],
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
        $query = Campaigns::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', '_id', $this->_id])
            ->andFilterWhere(['like', 'users_id', $this->users_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'university', $this->university])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'video_url', $this->video_url])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'days_run', $this->days_run])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at]);

        return $dataProvider;
    }
}