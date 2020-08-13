<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Currency;

class ApiController extends Controller
{

    public function actionCurrencies()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        $currencies = Currency::find();
        if (isset($get['offset'])) {
            $currencies->offset($get['offset']);
        }

        if (isset($get['limit'])) {
            $currencies->limit($get['limit']);
        }

        return $this->asJson($currencies->all());
    }

    public function actionCurrency($currencyId)
    {
        if(!$currency = Currency::findOne($currencyId)){
            return $this->asJson(array('error' => 'not found'));
        }
        else{
            return $this->asJson($currency);
        }
    }
}
