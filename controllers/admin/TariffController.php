<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
        $tariff = new Tariff();
        if ($tariff->load(Yii::$app->request->post()) && $tariff->validate()) {
            $tariff->save();
            return $this->redirect(['index','id'=> Tariff::find()->all()]);
        } else {
            return $this->render('edit', ['tariff' => $tariff]);
        }
    }

    public function actionEdit($id)
    {
        $tariff = Tariff::findOne($id);
        if ($tariff->load(Yii::$app->request->post()) && $tariff->validate()) {
            $tariff->save();
            return $this->redirect(['index','id'=> Tariff::find()->all()]);
        } else {
            return $this->render('edit', ['tariff' => $tariff]);
        }
    }

    public function actionDelete($id)
    {
        $tariff = Tariff::findOne($id);
        if ($tariff === null) {
            throw new NotFoundHttpException;
        }

        $tariff->delete();

        return $this->redirect(['index','id'=> Tariff::find()->all()]);
    }
}
