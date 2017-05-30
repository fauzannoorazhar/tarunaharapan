<?php

namespace frontend\controllers;
use common\models\Artikel;
use yii\web\NotFoundHttpException;

class ArtikelController extends \yii\web\Controller
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
        if (($model = Artikel::findOne($id)) !== null) { // Mysql Select * From
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
