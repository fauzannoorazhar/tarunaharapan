<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\Helpers\ArrayHelper;


/**
 * This is the model class for table "jurusan".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property JurusanAngkatan[] $jurusanAngkatans
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama','logo'], 'string', 'max' => 255],
            [['nama'],'unique','message'=>'{attribute} Jurusan Sudah Ada'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama Jurusan',
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusanAngkatan()
    {
        return $this->hasMany(JurusanAngkatan::className(), ['id_jurusan' => 'id']);
    }

    public function getSiswa()
    {
        return $this
            ->hasMany(Siswa::className(),['id_jurusan_angkatan' => 'id'])
            ->via('jurusanAngkatan');
    }

    public function getList()
    {
        return ArrayHelper::map(Jurusan::find()->all(),'id','nama');
    }

    public static function getJumlah()
    {
        return Jurusan::find()->count();
    }

    //Fungsi Untuk Mengecek Apakaha Gambar Terdapat Dalam Direktori
    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->logo == null && !file_exists('@uploads/uploads/'.$this->logo)){
            return Html::img('@uploads/images/logo2.png',$htmlOptions);
        } else {
            return Html::img('@uploads/uploads/'. $this->logo,$htmlOptions);
        }
    }
}