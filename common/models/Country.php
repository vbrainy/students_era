<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for collection "country".
 *
 * @property \MongoId|string $_id
 * @property mixed $id
 * @property mixed $iso
 * @property mixed $iso3
 * @property mixed $fips
 * @property mixed $country
 * @property mixed $continent
 * @property mixed $currency_code
 * @property mixed $currency_name
 * @property mixed $phone_prefix
 * @property mixed $postal_code
 * @property mixed $languages
 * @property mixed $geonameid
 */
class Country extends \yii\mongodb\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function collectionName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return [
            '_id',
            'id',
            'iso',
            'iso3',
            'fips',
            'country',
            'continent',
            'currency_code',
            'currency_name',
            'phone_prefix',
            'postal_code',
            'languages',
            'geonameid',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'iso', 'iso3', 'fips', 'country', 'continent', 'currency_code', 'currency_name', 'phone_prefix', 'postal_code', 'languages', 'geonameid'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            '_id' => 'ID',
            'id' => 'Id',
            'iso' => 'Iso',
            'iso3' => 'Iso3',
            'fips' => 'Fips',
            'country' => 'Country',
            'continent' => 'Continent',
            'currency_code' => 'Currency Code',
            'currency_name' => 'Currency Name',
            'phone_prefix' => 'Phone Prefix',
            'postal_code' => 'Postal Code',
            'languages' => 'Languages',
            'geonameid' => 'Geonameid',
        ];
    }
    
    public static function getAllCountry(){
      return ArrayHelper::map(Country::find()->asArray()->all(), 'id', 'country');   
    }
}
