<?php

namespace frontend\controllers;
use Yii;
use common\models\JurusanAngkatan;
use common\models\JurusanAngkatanSearch;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;


class AlumniController extends \yii\web\Controller
{
	public function actionIndex()
	{
        $query = JurusanAngkatan::findJurusanAngkatanStatus();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

		return $this->render('index',[
            'dataProvider' => $dataProvider
        ]);
	}

    public function actionDetail($slug)
    {
        $model = $this->findSlug(['slug' => $slug]);
        
        return $this->render('detail',[
			'model' => $model,
        ]);

    }

    public function actionDetailSiswa()
    {
        return $this->render('detail_siswa');
    }

    protected function findSlug($condition)
    {
        if (($model = JurusanAngkatan::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
