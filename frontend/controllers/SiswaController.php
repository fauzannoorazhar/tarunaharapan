<?php
namespace frontend\controllers;
use common\models\JurusanAngkatan;
use yii\web\NotFoundHttpException;

class SiswaController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDetail($slug)
    {
        $model = $this->findSlug(['slug' => $slug]);

        return $this->render('detail',[
            'model' => $model,
        ]);
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
