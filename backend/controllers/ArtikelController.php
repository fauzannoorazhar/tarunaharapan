<?php

namespace backend\controllers;

use Yii;
use common\models\Artikel;
use common\models\ArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\Setup;
use yii\filters\AccessControl;
use common\models\User;
use common\models\StatusArtikel;

/**
 * ArtikelController implements the CRUD actions for Artikel model.
 */
class ArtikelController extends Controller
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
                        'actions' => ['index','view','create','update','delete','proses','terima','tolak','ubah-status'],
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
     * Lists all Artikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }

        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionProses()
    {
        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->searchProses(Yii::$app->request->queryParams);

        return $this->render('proses', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerima()
    {
        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->searchTerima(Yii::$app->request->queryParams);

        return $this->render('terima', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTolak()
    {
        $searchModel = new ArtikelSearch();
        $dataProvider = $searchModel->searchTolak(Yii::$app->request->queryParams);

        return $this->render('tolak', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUbahStatus($id,$id_status_artikel)
    {
        $model = $this->findModel($id);
        $model->id_status_artikel = $id_status_artikel;
        /*$model->sendMail();*/

        //save tanpa validasi
        if($model->save(false)){
            Yii::$app->session->setFlash('success','Status Telah Diubah');
            return $this->redirect(Yii::$app->request->referrer);
        } else{
            return print_r($model->getErrors());
        }
    }

    /**
     * Displays a single Artikel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Artikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }

        $model = new Artikel();

        if (User::isAnggota()) {
            $model->id_status_artikel = StatusArtikel::DIPROSES;
        } else {
            $model->id_status_artikel = StatusArtikel::DITERIMA;
        }

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
            if($model->save(false)){

                if (User::isAnggota()) {
                    Yii::$app->session->setFlash('success', 'Artikel telah dibuat, silahkan tunggu artikel diterima oleh admin, dengan melakukan cek pada email anda!');
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Artikel model.
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
     * Deletes an existing Artikel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * Finds the Artikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Artikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artikel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
