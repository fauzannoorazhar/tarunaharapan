<?php

namespace backend\controllers;

use Yii;
use common\models\Tentang;
use common\models\TentangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * TentangController implements the CRUD actions for Tentang model.
 */
class TentangController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [//AccessControl menyediakan kontrol akses sederhana berdasarkan aturan perangkat  
                'class' => AccessControl::className(),
                'rules' => [ 
                    [
                        'actions' => ['signup','login','error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','create','update','delete','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tentang models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TentangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tentang model.
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
     * Creates a new Tentang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tentang();

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

    /**
     * Updates an existing Tentang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Untuk merubah atau update gambar, jadi tidak perlu menambah gambar lagi ketika akan mengupdate gambar
        $old_picture = $model->gambar;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload 
            $gambar = UploadedFile::getInstance($model, 'gambar');

            // kondisi yang tidak mengharuskan menambah gambar lagi
            if(is_object($gambar)){
                $model->gambar = $gambar->baseName;//Nama dasar file uploads
                $model->gambar .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->gambar .= '.' . $gambar->extension;

                //@path Penyimpanan Jelas
                $path = Yii::getAlias('@frontend').'/web/uploads/';

                $gambar->saveAs($path.$model->gambar, false);

                //Memerikasi apakah file dalam di rektori ada
                if(file_exists($path.$old_picture) AND $old_picture != null)
                {
                    //Menghapus file
                    unlink($path.$old_picture);
                }

            } else {
                $model->gambar = $old_picture;
            }

            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Tentang model.
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
     * Finds the Tentang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tentang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tentang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
