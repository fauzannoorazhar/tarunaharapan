<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\models\User;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id
 * @property string $id_user
 * @property string $judul
 * @property string $isi
 * @property string $tanggal
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_by',
                'updatedByAttribute' => 'update_by',
                    'value' => function ($event) {
                        return User::getNamaUser();
                },
            ],
        ];
    }

/*'class' => TimestampBehavior::className(),
    'attributes' => [
        ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
        ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
    ],*/

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul', 'isi'], 'required'],
            [['isi'], 'string'],
            [['judul'], 'string', 'max' => 50],
            [['gambar'], 'string', 'max' => 255],
            ['gambar', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul Artikel',
            'isi' => 'Isi Artikel',
            'gambar' => 'Gambar',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
        ];
    }

    //Melakukan Sebuah Aksi Untuk Menset Data Sebelum Disimpan
    /*public function beforeSave($insert) 
    {
        
        if($insert){
            $this->id_user = Yii::$app->user->identity->username;
            $this->tanggal = date('Y-m-d');
        }
        return parent::beforeSave($insert);
    }*/

    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->gambar == null && !file_exists('@web/uploads/'.$this->gambar)){
            return Html::img('@web/images/logo2.png',$htmlOptions);
        } else {
            return Html::img('@web/uploads/'. $this->gambar,$htmlOptions);
        }
    }
}
