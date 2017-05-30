<?php

namespace frontend\controllers;
use common\models\Kegiatan;

class KegiatanController extends \yii\web\Controller
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

    protected function findModel($id)
    {
        if (($model = Kegiatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
