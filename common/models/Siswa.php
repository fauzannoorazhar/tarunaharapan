<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

use common\models\User;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "siswa".
 *
 * @property integer $id
 * @property string $nama
 * @property string $nisn
 * @property string $alamat
 * @property string $photo
 * @property integer $status
 * @property integer $id_jenis_kelamin
 * @property integer $id_jurusan_angkatan
 *
 * @property JurusanAngkatan $idJurusanAngkatan
 * @property JenisKelamin $idJenisKelamin
 */
class Siswa extends \yii\db\ActiveRecord
{
    const ALUMNI = 2;
    const BELUM_LULUS = 1;

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
            [['nama'], 'unique','message' => '{attribute} Siswa Sudah Ada'],
            [['nama', 'nisn', 'alamat','status', 'id_jenis_kelamin', 'id_jurusan_angkatan'], 'required'],
            [['alamat'], 'string'],
            [['tanggal_lahir'],'safe'],
            [['status', 'id_jenis_kelamin', 'id_jurusan_angkatan'], 'integer'],
            [['nama', 'nisn', 'photo'], 'string', 'max' => 255],
            ['photo', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
            [['id_jurusan_angkatan'], 'exist', 'skipOnError' => true, 'targetClass' => JurusanAngkatan::className(), 'targetAttribute' => ['id_jurusan_angkatan' => 'id']],
            [['id_jenis_kelamin'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKelamin::className(), 'targetAttribute' => ['id_jenis_kelamin' => 'id']],
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
            'nisn' => 'Nisn',
            'alamat' => 'Alamat',
            'photo' => 'Photo',
            'tanggal_lahir' => 'Tanggal Lahir',
            'status' => 'Status',
            'id_jenis_kelamin' => 'Jenis Kelamin',
            'id_jurusan_angkatan' => 'Jurusan Angkatan',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
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
                'updatedByAttribute' => 'update_by',
                    'value' => function ($event) {
                        return User::getNamaUser();
                },
            ],
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusanAngkatan()
    {
        return $this->hasOne(JurusanAngkatan::className(), ['id' => 'id_jurusan_angkatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jenis_kelamin']);
    }

    public static function getListStatus()
    {
        return [self::ALUMNI=>'Alumni',self::BELUM_LULUS=>'Siswa Aktif'];
    }

    public function getStatus()
    {
        if($this->status == self::ALUMNI) {
            return '<span class="label label-warning">Alumni</span>';
        } elseif ($this->status == self::BELUM_LULUS) {
            return '<span class="label label-success">Siswa Aktif</span>';
        }
    }

    public static function getList()
    {
        $hasil = [];
        foreach (JurusanAngkatan::find()->all() as $data) {
            $hasil[$data->id] = $data->jurusan->nama.' - '.$data->angkatan->tahun;
        }

        return $hasil;  
    }

    public function getNamaJurusanAngkatan()
    {
        if($this->id_jurusan_angkatan == $this->id_jurusan_angkatan){
            return $this->getList();
        }
    }

    public static function getJumlah()
    {
        return Siswa::find()->count();
    }

    public static function getJumlahRpl()
    {
        return Siswa::find()->where(['id_jurusan_angkatan' => 6,'status' => 2])->count();
    }

    public static function getJumlahAka()
    {
        return Siswa::find()->where(['id_jurusan_angkatan' => 8,'status' => 2])->count();
    }

    public static function getJumlahPm()
    {
        return Siswa::find()->where(['id_jurusan_angkatan' => 9,'status' => 2])->count();
    }

    public static function getJumlahTkr()
    {
        return Siswa::find()->where(['id_jurusan_angkatan' => 10,'status' => 2])->count();
    }

    public static function getJumlahTsm()
    {
        return Siswa::find()->where(['id_jurusan_angkatan' => 11,'status' => 2])->count();
    }

    public function getJumlahSiswaByJurusan()
    {
        return Siswa::find()->joinWith('jurusanAngkatan')->where(['id_jurusan' => 1])->count();
    }

    /* Memberikan return untuk di radiobutton
    public function getStatus()
    {
        if ($this->status == 1){
            return "Belum Lulus";
        } elseif ($this->status == 2) {
            return "Alumni";
        } else {
            return "";
        }
    }*/

    public static function findSiswaGroupBy()
    {
        return Siswa::find()
        ->where(['status' => 2])
        ->groupBy('id_jurusan_angkatan')
        ->all();
    }

    public static function findSiswaByJurusanAngkatan($JurusanAngkatan)
    {
        return Siswa::find()
        ->where(['status' => 2,'id_jurusan_angkatan' => $JurusanAngkatan])
        ->all();
    }

    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->photo == null && !file_exists('@web/uploads/'.$this->photo)){
            return Html::img('@web/images/avatar.jpeg',$htmlOptions);
        } else {
            return Html::img('@web/uploads/'. $this->photo,$htmlOptions);
        }
    }
}