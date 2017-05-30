<?php

namespace frontend\controllers;
use Yii;
use common\models\Anggota;
use common\modelSearch\AnggotaSearch;
use yii\web\NotFoundHttpException;

class AnggotaController extends \yii\web\Controller
{
    public function actionDetail($id,$id_angkatan=null,$tahun=null) // Detail
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$id_angkatan);

        return $this->render('detail', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'model' => $this->findModel($id),
                'id_angkatan' => $id_angkatan,
                'tahun' => $tahun,
            ]);
    }

    public function actionIndex() // Index
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id) // Melihat Data Dengan Parameter ID
    {
        if (($model = Anggota::findOne($id)) !== null) { // Mysql Select * From
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
