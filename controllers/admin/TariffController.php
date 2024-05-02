<?php

namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use app\models\Tariff;

class TariffController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $tariffs = Tariff::find()->all();
        return $this->render('index', [
            'tariffs' => $tariffs,
        ]);
    }

    // TODO В экшенах Create и Edit - повторяющийся код. Куда-нибудь вынести...
    public function actionCreate()
    {
        $tariff = new Tariff();
        if ($tariff->load(Yii::$app->request->post()) && $tariff->validate()) {
            $tariff->save();
            return $this->redirect(['index', 'id' => Tariff::find()->all()]);
        } else {
            return $this->render('edit', ['tariff' => $tariff]);
        }
    }

    public function actionEdit($id)
    {
        $tariff = Tariff::findOne($id);
        if ($tariff->load(Yii::$app->request->post()) && $tariff->validate()) {
            $tariff->save();
            return $this->redirect(['index', 'id' => Tariff::find()->all()]);
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

        return $this->redirect(['index', 'id' => Tariff::find()->all()]);
    }

    public function actionTest()
    {
        $tariff = new Tariff();
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if (Yii::$app->request->isAjax) {

            $data = Yii::$app->request->post();
            $id = $data['Tariff']['id'];
            $speed = $data['Tariff']['speed'];

            $tariff = Tariff::findOne($id);
            if ($tariff === null) {
                return [
                    "status" => "404",
                    "error" => "Tariff not found"
                ];
            }

            $tariff->speed = $speed;

            if ($tariff->save()) {
                return [
                    "status" => "200",
                    "data" => $tariff,
                    "error" => null
                ];
            } else {
                return [
                    "status" => "503",
                    "data" => null,
                    "error" => "saving to the database failed"
                ];
            }
        } else {
            return [
                "status" => "400",
                "data" => null,
                "error" => "bad request"
            ];
        }
    }
}
