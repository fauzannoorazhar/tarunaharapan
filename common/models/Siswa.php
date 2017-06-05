<?php

namespace common\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "siswa".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $photo
 * @property integer $id_jurusan
 * @property integer $id_angkatan
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_jurusan','status', 'id_angkatan','nisn'], 'required'],
            [['alamat'], 'string'],
            [['id_jurusan', 'id_angkatan'], 'integer'],
            [['nama','nisn'], 'string', 'max' => 255],
            [['photo'], 'file']
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
            'nisn' => 'NISN',
            'alamat' => 'Alamat',
            'photo' => 'Photo',
            'id_jurusan' => 'Jurusan',
            'id_angkatan' => 'Angkatan',
            'status' => 'Status'
        ];
    }

    public function getStatus()
    {
        if ($this->status == 1) {
        return 'Alumni';
    }elseif($this->status == 0) {
        return 'Belum Lulus';
    } else {
        return 'tidak ada';
        }
    }

    public static function getList()
    {
        return [1=>'Alumni',0=>'Belum Lulus'];
    }

    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(),['angkatan.id'=>'id_angkatan']);
    }

    public function getJurusan()
    {
        return $this->hasOne(Jurusan::className(),['jurusan.id'=>'id_jurusan']);
    }

    public function getRelationField($relation,$field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;   
        } else {
            return null;
        }
    }
}
