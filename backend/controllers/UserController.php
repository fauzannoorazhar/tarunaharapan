<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use common\models\setPasswordForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'actions' => ['signup', 'login'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','create','update','delete','view','profil','set-password','aktifkan','status-aktif'],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {        
        /*if (User::isAdmin()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isOperator()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        }*/
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionProfil()
    {        
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }

        if (User::isAdmin()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isOperator()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isAnggota()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        }
        
        return $this->render('profil', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->status = 1;
        $model->id_role = 2;
        $model->model = 'Operator';

        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            Yii::$app->session->setFlash('success','Data berhasil disimpan.');
            $model->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            /*$model->setPasswordHash();*/
            $model->save();

            if (User::isAdmin() && User::isOperator()) {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                return $this->redirect(['profil', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionSetPassword()
    {
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }

        if (User::isAdmin()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isOperator()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isAnggota()) {
            $id = User::getUser();
            $user = User::find()->where(['id' => $id])->one();
        }

        $referrer = Yii::$app->request->referrer;

        $model = new SetPasswordForm;

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);    

            if($user->save()) {
                \Yii::$app->session->setFlash('success','Password berhasil disimpan');

                if (User::isAdmin() && User::isOperator()) {
                    Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                    return $this->redirect(['view', 'id' => $model]);
                } else {
                    Yii::$app->session->setFlash('success','Data berhasil disimpan.');
                    return $this->redirect(['profil', 'id' => $model]);
                }
            } else {
                print_r($user->getErrors());
            }
        }

        return $this->render('setPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAktifkan($id)
    {
        $model = $this->findModel($id);
        $model->status = User::ACTIVE;

        if($model->save()){        
            return $this->redirect(['site/login']);
        } else {
            return print_r($model->getErrors());
        }
    }

    public function actionStatusAktif($id)
    {
        $model = $this->findModel($id);

        $model->status = User::ACTIVE;
        if ($model->save()) {
            Yii::$app->session->setFlash('success','User telah diaktifkan');
            return $this->redirect(Yii::$app->request->referrer);
        }
    }
}
