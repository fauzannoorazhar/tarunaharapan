<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\TagArtikel;
use common\models\Artikel;
use common\models\StatusArtikel;
use common\models\ArtikelSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;

class TagArtikelController extends \yii\web\Controller
{
    public function actionIndex($slug)
    {	
    	$model = $this->findSlug(['slug' => $slug]);

        $query = Artikel::find()
    	->joinWith('tagArtikel')
    	->where(['id_status_artikel' => StatusArtikel::DITERIMA,'tag_artikel.slug' => $slug])
    	->orderBy(['populer' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index',[
        	'model' => $model,
            'dataProvider' => $dataProvider
        ]);
    }

    protected function findSlug($condition)
    {
        if (($model = TagArtikel::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
