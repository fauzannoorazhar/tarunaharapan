<?php

namespace frontend\controllers;
use common\models\Tokoh;
use yii\web\NotFoundHttpException;


class TokohController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    protected function findModel($id) // Melihat Data Dengan Parameter ID
    {
        if (($model = Tokoh::findOne($id)) !== null) { // Mysql Select * From
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
