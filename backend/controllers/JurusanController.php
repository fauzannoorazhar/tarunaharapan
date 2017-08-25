<?php

namespace backend\controllers;

use Yii;
use common\models\Jurusan;
use common\models\JurusanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * JurusanController implements the CRUD actions for Jurusan model.
 */
class JurusanController extends Controller
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
     * Lists all Jurusan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JurusanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jurusan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {   
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Jurusan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Jurusan();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload
            $picture = UploadedFile::getInstance($model, 'logo');

            if(is_object($picture))//is_object adalah fungsi yang digunakan unutuk mengetahui apakah sebuhab variabel bernilai objek atau tidak
            {
                $model->logo = $picture->baseName; 
                /*print $picture->name;
                die;*/
                $model->logo .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->logo .= '.' . $picture->extension;

                $path = Yii::getAlias('@frontend').'/web/uploads/'.$model->logo;
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
     * Updates an existing Jurusan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Untuk merubah atau update logo, jadi tidak perlu menambah logo lagi ketika akan mengupdate logo
        $logo_lama = $model->logo;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload 
            $logo = UploadedFile::getInstance($model, 'logo');

            // kondisi yang tidak mengharuskan menambah logo lagi
            if(is_object($logo)){
                $model->logo = $logo->baseName;//Nama dasar file uploads
                $model->logo .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->logo .= '.' . $logo->extension;

                //@path Penyimpanan Jelas
                $path = Yii::getAlias('@frontend').'/web/uploads/';

                $logo->saveAs($path.$model->logo, false);

                //Memerikasi apakah file dalam di rektori ada
                if(file_exists($path.$logo_lama) AND $logo_lama != null)
                {
                    //Menghapus file
                    unlink($path.$logo_lama);
                }

            } else {
                $model->logo = $logo_lama;
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
     * Deletes an existing Jurusan model.
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
     * Finds the Jurusan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Jurusan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Jurusan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
