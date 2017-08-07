<?php

namespace backend\controllers;

use Yii;
use common\models\Siswa;
use common\models\SiswaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * SiswaController implements the CRUD actions for Siswa model.
 */
class SiswaController extends Controller
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
                        'actions' => ['index','view','create','update','delete','alumni','aktif'],
                        'allow' => true,
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
     * Lists all Siswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAlumni()
    {
        return $this->render('alumni');
    }

    public function actionAktif()
    {
        return $this->render('aktif');
    }

    /**
     * Displays a single Siswa model.
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
     * Creates a new Siswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Siswa();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload
            $picture = UploadedFile::getInstance($model, 'photo');

            if(is_object($picture))//is_object adalah fungsi yang digunakan unutuk mengetahui apakah sebuah variabel bernilai objek atau tidak
            {
                $model->photo = $picture->baseName; 
                /*print $picture->name;
                die;*/
                $model->photo .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->photo .= '.' . $picture->extension;

                $path = Yii::getAlias('@app').'/web/uploads/'.$model->photo;
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
     * Updates an existing Siswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        // Untuk merubah atau update photo, jadi tidak perlu menambah photo lagi ketika akan mengupdate photo
        $old_picture = $model->photo;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload 
            $photo = UploadedFile::getInstance($model, 'photo');

            // kondisi yang tidak mengharuskan menambah photo lagi
            if(is_object($photo)){
                $model->photo = $photo->baseName;//Nama dasar file uploads
                $model->photo .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->photo .= '.' . $photo->extension;

                //@path Penyimpanan Jelas
                $path = Yii::getAlias('@app').'/web/uploads/';

                $photo->saveAs($path.$model->photo, false);

                //Memerikasi apakah file dalam di rektori ada
                if(file_exists($path.$old_picture) AND $old_picture != null)
                {
                    //Menghapus file
                    unlink($path.$old_picture);
                }

            } else {
                $model->photo = $old_picture;
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
     * Deletes an existing Siswa model.
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
     * Finds the Siswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Siswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Siswa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
