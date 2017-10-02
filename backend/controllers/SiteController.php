<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use common\models\Siswa;
use common\models\JurusanAngkatan;
use common\models\Anggota;

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
                        'actions' => ['signup', 'login','error','register'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index','dev','anggota','error','register','logout','generate'],
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

    public function actionAnggota()
    {
        $this->layout = 'anggota';

        return $this->render('anggota');
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (User::isAnggota()) {
            $this->layout = 'anggota';
        }
        
        if (User::isAnggota()) {
            return $this->render('anggota');
        } elseif (User::isOperator()) {
            return $this->render('index');
        } else {
            return $this->render('admin');
        }
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
            if (User::isAdmin()) {
                return $this->redirect(['site/index']);
            } elseif (User::isOperator()) {
                return $this->redirect(['site/index']);
            } elseif (User::isAnggota()) {
                return $this->redirect(['site/anggota']);
            }

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

    function get_students($obj)
    {
        if (!is_object($obj)) {
            return false;
        }

        return $obj->students;
    }

    public function actionDev()
    {   
        /*return $this->render('dev', ['time' => date('H:i:s')]);*/
        /*$i = 1;
        foreach (TagArtikel::find()->all() as $lirik) {
            if (!$lirik->save()) {
                print_r($lirik->getErrors());
            } else {
                print $i++.'<br>';
            }
        }*/
        /*foreach (JurusanAngkatan::find()->all() as $data) {
            if (!$data->save()) {
                print_r($data->getErrors());
            } else {
                print 'sukses';
            }
        }*/

        /*$user = User::find()->where(['id' => Yii::$app->user->identity->id])->one();
        $user->status = 2;*/

        /*print $user->status;*/
        $siswa = Siswa::find()
            ->joinWith('angkatan')
            ->andWhere(['tahun' => date('Y')])
            ->count();

        echo $siswa;

    }

    public function actionDate()
    {   
        return $this->render('dev', ['time' => date('Y-m-d')]);

    }
}
