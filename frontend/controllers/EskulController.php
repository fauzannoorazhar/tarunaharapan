<?php

namespace frontend\controllers;
use yii\web\Controller;
use common\models\Eskul;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\StatusArtikel;
use yii\data\ActiveDataProvider;

class EskulController extends \yii\web\Controller
{
    public function actionDetail($slug)
    {
    	$model = $this->findSlug(['slug' => $slug]);

        return $this->render('detail',[
        	'model' => $model,
        ]);
    }

    protected function findSlug($condition)
    {
        if (($model = Eskul::findOne($condition)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
