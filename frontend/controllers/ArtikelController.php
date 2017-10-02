<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\Artikel;
use common\models\ArtikelSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\StatusArtikel;
use yii\data\ActiveDataProvider;

class ArtikelController extends \yii\web\Controller
{
    public function actionDetail($slug)
    {
    	$model = $this->findSlug(['slug' => $slug]);
        $model->populer++;

        if ($model->save(false)) {
            return $this->render('detail',[
                'model' => $model,
            ]);
        }
    }

    public function actionIndex()
    {
        $searchModel = new ArtikelSearch();

        $query = Artikel::find()->where(['id_status_artikel' => StatusArtikel::DITERIMA])->orderBy(['populer' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index',[
            'model' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionSearch()
    {

        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->searchArtikel(Yii::$app->request->queryParams);

        return $this->render('search', [
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
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
