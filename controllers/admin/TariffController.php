<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\Tariff;

class TariffController extends Controller
{
    public function actionIndex()
    {
        $tariffs = Tariff::find()->all();
        return $this->render('index', [
            'tariffs' => $tariffs,
        ]);
    }

    public function actionCreate()
    {
    }

    public function actionEdit($id)
    {
    }

    public function actionDelete($id)
    {
    }
}
