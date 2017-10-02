<?php

namespace frontend\controllers;
use common\models\Tentang;

class TentangController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIcon()
    {
    	return $this->render('icon');
    }

}
