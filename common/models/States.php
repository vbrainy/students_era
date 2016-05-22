<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for collection "states".
 *
 * @property \MongoId|string $_id
 * @property mixed $region_id
 * @property mixed $name
 * @property mixed $timezone
 */
class States extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'states';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'region_id',
            'name',
            'timezone',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'name', 'timezone'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'region_id' => 'Region ID',
            'name' => 'Name',
            'timezone' => 'Timezone',
        ];
    }
    
    
    public static function getAllStatesByCountry($cId){
      return ArrayHelper::map(States::find()->where(['region_id'=> $cId])->asArray()->all(), 'id', 'name');   
    }
}
