<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\db\ActiveRecord;
use common\models\User;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "tentang".
 *
 * @property integer $id
 * @property string $isi
 * @property string $gambar
 */
class Tentang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tentang';
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
            ['isi','required','message' => '{attribute} Tidak Boleh Kosong'],
            [['isi'], 'string'],
            [['nama'], 'string', 'max' => 50],
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
            'nama' => 'Nama',
            'isi' => 'Konten',
            'gambar' => 'Gambar',
            'create_by' => 'Dibuat Oleh',
            'update_by' => 'Dirubah Oleh',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
        ];
    }

    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->gambar == null && !file_exists('@uploads/uploads/'.$this->gambar)){
            return Html::img('@uploads/images/logo2.png',$htmlOptions);
        } else {
            return Html::img('@uploads/uploads/'. $this->gambar,$htmlOptions);
        }
    }

}
