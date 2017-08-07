<?php
namespace frontend\controllers;
use Yii;
use common\models\JurusanAngkatan;
use common\models\JurusanAngkatanSearch;
use yii\web\NotFoundHttpException;


class AlumniController extends \yii\web\Controller
{
	public function actionIndex()
	{
		return $this->render('index');
	}

    public function actionDetail($id)
    {
        return $this->render('detail',[
			'model' => $this->findModel($id),
        ]);

    }

    public function actionDetailSiswa()
    {
        return $this->render('detail_siswa');
    }

    protected function findModel($id) 
    {
        if (($model = JurusanAngkatan::findOne($id)) !== null) { 
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
