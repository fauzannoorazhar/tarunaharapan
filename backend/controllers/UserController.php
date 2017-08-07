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
    public function actionView()
    {
        if (User::isSuperAdmin()) {
            $id = Yii::$app->user->identity->id;
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isAdmin()) {
            $id = Yii::$app->user->identity->id;
            $user = User::find()->where(['id' => $id])->one();
        }
        
        return $this->render('view', [
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
        $model->id_role = 2;
        $model->model = 'Admin';

        if ($model->load(Yii::$app->request->post())){
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            /*$model->setPasswordHash();*/
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionSetPassword()
    {
        if (User::isSuperAdmin()) {
            $id = Yii::$app->user->identity->id;
            $user = User::find()->where(['id' => $id])->one();
        } elseif (User::isAdmin()) {
            $id = Yii::$app->user->identity->id;
            $user = User::find()->where(['id' => $id])->one();
        }

        $model = new SetPasswordForm;

        if($model->load(Yii::$app->request->post()) && $model->validate()) {
            $user->password = Yii::$app->getSecurity()->generatePasswordHash($model->password);    

            if($user->save()) {
                \Yii::$app->session->setFlash('success','Password berhasil disimpan');

                /*if ($user->id_role == Role::OPD)
                    return $this->redirect(['opd/index']);*/
                
                return $this->redirect(['view','id' => Yii::$app->user->identity->id]);
            } else {
                print_r($user->getErrors());
                break;
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
}
