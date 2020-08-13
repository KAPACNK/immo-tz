<?php

namespace app\models;

use Yii;
use yii\behaviors\AttributeTypecastBehavior;
use yii\db\ActiveRecord;

class Currency extends ActiveRecord
{
    public function fetchCurrencies()
    {
        $apiUrl = 'http://www.cbr.ru/scripts/XML_daily.asp';
        $xml = simplexml_load_string(file_get_contents($apiUrl));
        $transaction = Yii::$app->db->beginTransaction();
        foreach ($xml as $currency) {
            $currencyQuery = Currency::findOne(['name' => $currency->CharCode]);
            if (!$currencyQuery) {
                $currencyQuery = new Currency();
                $currencyQuery->name = $currency->CharCode;
                $currencyQuery->rate = str_replace(',', '.', $currency->Value);
                $currencyQuery->insert_dt = date('Y-m-d H:i:s');
            } else {
                $currencyQuery->rate = str_replace(',', '.', $currency->Value);
                $currencyQuery->insert_dt = date('Y-m-d H:i:s');
            }
            $currencyQuery->save();
        }
        $transaction->commit();
    }
}
