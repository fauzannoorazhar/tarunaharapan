<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use common\models\Anggota;
use common\models\JurusanAngkatan;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['signup', 'login', 'error','register','error','dev'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index','logout','login','logout','error','dev'],
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
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionError()
    {

        $exception = Yii::$app->errorHandler->exception;
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (User::isAdmin() || User::isOperator() || User::isAnggota()) {
                $user = User::findOne(['id' => User::getUser()]);
                $user->touch('last_login');
                $user->update();
            } 

            \Yii::$app->getSession()->setFlash('success', 'Selamat Datang '.User::getNamaUser());
            return $this->redirect(['site/index']);
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister()
    {
        $this->layout = 'login';

        $model = new Anggota();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->createUser();
            $model->sendMailToUser();
            $model->sendMailToAdmin();
                return $this->redirect(['site/login']); 
        } else {
            return $this->render('register',[
                'model' => $model
            ]);
         }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {

        Yii::$app->user->logout();

        return $this->redirect(['site/login']);
    }

    /*public function actionDev()
    {
        foreach (Artikel::find()->all() as $data) {
            $data->id;
            $data->judul;
            $data->isi;
            $data->slug;
            if ($data->save()) {
                return 'HAHAHAH';
            }
        }
    }*/

    public function actionDev()
    {   
        foreach (JurusanAngkatan::find()->all() as $data) {
            if ($data->save()) {
                Yii::$app->session->setFlash('success','Kamu Berhasil Melakukan Save Semua Data');
            }
        }

    }
}
