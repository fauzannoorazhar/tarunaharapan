<?php

namespace backend\controllers;

use Yii;
use common\models\Anggota;
use common\models\AnggotaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * AnggotaController implements the CRUD actions for Anggota model.
 */
class AnggotaController extends Controller
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
                        'actions' => ['index','create','update','delete','view','profil','set-photo'],
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
     * Lists all Anggota models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnggotaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Anggota model.
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
     * Creates a new Anggota model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Anggota();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Action Tambah Berkas Upload
            $picture = UploadedFile::getInstance($model, 'photo');

            if(is_object($picture))//is_object adalah fungsi yang digunakan unutuk mengetahui apakah sebuhab variabel bernilai objek atau tidak
            {
                $model->photo = $picture->baseName; 
                /*print $picture->name;
                die;*/
                $model->photo .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->photo .= '.' . $picture->extension;

                $path = Yii::getAlias('@frontend').'/web/uploads/'.$model->photo;
                $picture->saveAs($path, false);
            }
            if($model->save()){
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionProfil($id)
    {        
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }
        
        return $this->render('profil', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSetPhoto($id)
    {
        $model = $this->findModel($id);

        if ($model->photo == null) {
            Yii::$app->session->setFlash('danger','Anda sudah menggunakan photo default.');
            return $this->redirect(['profil', 'id' => $model->id]);
        } else {
            $photo_lama = $model->photo;
            $path = Yii::getAlias('@frontend').'/web/uploads/';

            if (file_exists($path.$photo_lama) AND $photo_lama != null) {
                unlink($path.$photo_lama);
            }

            $model->photo = null;
            if ($model->save(false)) {
                Yii::$app->session->setFlash('info','Photo profil telah diset ulang.');
                return $this->redirect(['profil', 'id' => $model->id]);
            }
        }
    }

    /**
     * Updates an existing Anggota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }
        
        $model = $this->findModel($id);

        $photo_lama = $model->photo;

        if ($model->load(Yii::$app->request->post())) {
            // Action Tambah Berkas Upload 
            $photo = UploadedFile::getInstance($model, 'photo');

            // kondisi yang tidak mengharuskan menambah photo lagi
            if(is_object($photo)){
                $model->photo = $photo->baseName;//Nama dasar file uploads
                $model->photo .= Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));
                $model->photo .= '.' . $photo->extension;

                //@path Penyimpanan Jelas
                $path = Yii::getAlias('@frontend').'/web/uploads/';

                $photo->saveAs($path.$model->photo, false);

                //Memerikasi apakah file dalam di rektori ada
                if(file_exists($path.$photo_lama) AND $photo_lama != null)
                {
                    //Menghapus file
                    unlink($path.$photo_lama);
                }

            } else {
                $model->photo = $photo_lama;
            }

            if($model->save(false)){
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['profil', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Anggota model.
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
     * Finds the Anggota model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Anggota the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anggota::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
