<?php
namespace frontend\controllers;
use common\models\Siswa;

class SiswaController extends \yii\web\Controller
{
    public function actionDetailSiswa($id)
    {
        return $this->render('detail-siswa',[
        	'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id) 
    {
        if (($model = Siswa::findOne($id)) !== null) { 
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
