<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "eskul".
 *
 * @property integer $id
 * @property string $nama
 * @property string $gambar
 */
class Eskul extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eskul';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama','urutan'],'unique','message' => '{attribute} Sudah Ada'],
            [['nama','keterangan'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['nama', 'gambar','slug'], 'string', 'max' => 255],
            [['create_at', 'update_at', 'create_by','urutan'], 'integer'],
            ['gambar','safe'],
            ['gambar', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
            [['create_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['create_by' => 'id']],
        ];
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
                'updatedByAttribute' => null,
                    'value' => function ($event) {
                        return User::getUser();
                },
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'nama',
                'immutable' => true,
                'ensureUnique' => true,
            ],
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
            'urutan' => 'Urutan Tampil',
            'gambar' => 'Gambar',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
            'create_by' => 'Dibuat Oleh',
            'keterangan' => 'Keterangan',
            'slug' => 'Slug',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_by']);
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

    public function getKeterangan()
    {
        return substr($this->keterangan, 0, 350);
    }

    public function findEskulNotId()
    {
        return static::find()
        ->limit(20)
        ->orderBy(['urutan' => SORT_DESC])
        ->andWhere(['not', ['id' => $this->id]])
        ->all();;
    }
}