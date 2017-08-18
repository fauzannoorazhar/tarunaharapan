<?php

namespace frontend\controllers;
use yii\web\Controller;
use common\models\Artikel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Rating;
use yii\data\ActiveDataProvider;

class ArtikelController extends \yii\web\Controller
{
    public function actionDetail($slug)
    {

    	$model = $this->findSlug(['slug' => $slug]);

        return $this->render('detail',[
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $query = Artikel::find()->orderBy(['id' => SORT_DESC]);
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

    protected function findSlug($condition)
    {
        if (($model = Artikel::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
