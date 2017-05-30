<?php

namespace frontend\controllers;
use Yii;
use common\models\Angkatan;
use common\modelSearch\AnggotaSearch;
use yii\web\NotFoundHttpException;

class AngkatanController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        return $this->render('detail', [
        		'model' => $this->findModel($id),
        	]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionIndex()
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
        if (($model = Angkatan::findOne($id)) !== null) { // Mysql Select * From
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
