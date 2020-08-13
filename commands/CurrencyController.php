<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Currency;
use yii\console\Controller;
use yii\console\ExitCode;
class CurrencyController extends Controller
{
    public function actionFetch()
    {
        Currency::fetchCurrencies();
        echo 'Валюты были получены и записаны в базу данных!' . "\n";
        return ExitCode::OK;
    }
}
