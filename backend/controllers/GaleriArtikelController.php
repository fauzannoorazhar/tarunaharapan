<?php

namespace backend\controllers;

use Yii;
use common\models\GaleriArtikel;
use common\models\GaleriArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GaleriArtikelController implements the CRUD actions for GaleriArtikel model.
 */
class GaleriArtikelController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all GaleriArtikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GaleriArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GaleriArtikel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GaleriArtikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_artikel = null)
    {
        $model = new GaleriArtikel();
        $model->id_artikel = $id_artikel;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload
            $picture = UploadedFile::getInstance($model, 'gambar');

            if(is_object($picture))//is_object adalah fungsi yang digunakan unutuk mengetahui apakah sebuhab variabel bernilai objek atau tidak
            {
                $model->gambar = $picture->baseName; 
                /*print $picture->name;
                die;*/
                $model->gambar .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->gambar .= '.' . $picture->extension;

                $path = Yii::getAlias('@frontend').'/web/uploads/'.$model->gambar;
                $picture->saveAs($path, false);
            }
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

        /*if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }*/

    /**
     * Updates an existing GaleriArtikel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GaleriArtikel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GaleriArtikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GaleriArtikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GaleriArtikel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
