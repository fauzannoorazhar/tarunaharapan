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
    const AKTIF = 1;

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
            [['nama', 'nisn', 'alamat', 'id_jenis_kelamin', 'id_jurusan_angkatan'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['alamat'], 'string'],
            [['tanggal_lahir','status','photo'],'safe'],
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

    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(), ['id' => 'id_angkatan'])->via('jurusanAngkatan');
    }

    public function getJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['id' => 'id_jurusan'])->via('jurusanAngkatan');
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
        return [self::ALUMNI=>'Alumni',self::AKTIF=>'Siswa Aktif'];
    }

    public function getStatus()
    {
        if($this->status == self::ALUMNI) {
            return '<span class="label label-success"><i class="fa fa-mortar-board"></i> Alumni</span>';
        } elseif ($this->status == self::AKTIF) {
            return '<span class="label label-info"><i class="fa fa-check"></i> Siswa Aktif</span>';
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

    public static function getJumlahSiswaAktif()
    {
        return self::find()->where(['status' => self::AKTIF])->count();
    }

    public static function getJumlahSiswaAlumni()
    {
        return self::find()->where(['status' => self::ALUMNI])->count();
    }
    
    public static function getJumlahSiswaByJurusan()
    {
        return self::find()->joinWith('jurusanAngkatan')->where(['id_jurusan' => 1])->count();
    }

    public static function getJumlahAlumni($tahun)
    {
        switch ($tahun) {
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            case $tahun:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
            default:
                return self::find()->joinWith('angkatan')->where(['tahun' => $tahun,'status' => self::ALUMNI])->count();
                break;
        }
    }

    public static function findSiswaGroupByStatusAktif()
    {
        return self::find()
        ->where(['status' => self::AKTIF])
        ->groupBy('id_jurusan_angkatan')
        ->all();
    }

    public static function findSiswaByJurusanAngkatanAktif($JurusanAngkatanAktif)
    {
        return self::find()
        ->where(['status' => self::AKTIF,'id_jurusan_angkatan' => $JurusanAngkatanAktif])
        ->all();
    }

    public static function findSiswaGroupByStatusAlumni()
    {
        return self::find()
        ->joinWith('angkatan')
        ->orderBy('angkatan.tahun')
        ->where(['status' => self::ALUMNI])
        ->groupBy('id_jurusan_angkatan')
        ->all();
    }

    public static function findSiswaByJurusanAngkatanAlumni($JurusanAngkatan)
    {
        return self::find()
        ->where(['status' => self::ALUMNI,'id_jurusan_angkatan' => $JurusanAngkatan])
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

    public function beforeSave($insert)
    {
        /*if ($insert) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->tambah = 'Menambahkan Siswa '.$this->nama;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }*/
            $tahunSekarang = strtotime(date('Y'));
            $tahunAngkatan = strtotime($this->angkatan->tahun);
            $hasil = $tahunSekarang - $tahunAngkatan;
            //180 Jarak 3 Tahun Timestamp Unix
            if ($hasil < 180) {
                $this->status = self::AKTIF;
            } else {
                $this->status = self::ALUMNI;
            }
        return parent::beforeSave($insert);
    }

    /*public function afterDelete()
    {
        if (User::isOperator()) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->hapus = 'Menghapus Siswa '.$this->nama;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }

        parent::afterDelete();
    }*/

    /*public static function getWarnaBox($tahun)
    {
        switch ($tahun) {
            case 1:
                break;
                return '<div class="small-box bg-green">';
            case 2:
                break;
                return '<div class="small-box bg-green">';
            case 3:
                break;
                return '<div class="small-box bg-green">';
            case 4:
                break;
                return '<div class="small-box bg-green">';
            case 5:
                break;
                return '<div class="small-box bg-green">';
            case 6:
                break;
                return '<div class="small-box bg-green">';
            case 7:
                break;
                return '<div class="small-box bg-green">';
            case 8:
                break;
                return '<div class="small-box bg-green">';
            case 9:
                break;
                return '<div class="small-box bg-green">';
            default:
                break;
                return '<div class="small-box bg-green">';
        }
    }*/

    public static function getGrafikSiswaPertama()
    {
        $chart = null;

        foreach (JurusanAngkatan::find()->joinWith('angkatan')->where(['tahun' => date('Y')])->all() as $data) {
            $chart .= '{"label":"'.$data->jurusan->nama.'","value":"'.$data->getCount().'"},';
        }

        return $chart;
    }

    public static function getGrafikSiswaKedua($OneYearAgo)
    {
        $chart = null;

        foreach (JurusanAngkatan::find()->joinWith('angkatan')->where(['tahun' => $OneYearAgo])->all() as $data) {
            $chart .= '{"label":"'.$data->jurusan->nama.'","value":"'.$data->getCount().'"},';
        }

        return $chart;
    }

    public static function getGrafikSiswaKetiga($TwoYearAgo)
    {
        $chart = null;

        foreach (JurusanAngkatan::find()->joinWith('angkatan')->where(['tahun' => $TwoYearAgo])->all() as $data) {
            $chart .= '{"label":"'.$data->jurusan->nama.'","value":"'.$data->getCount().'"},';
        }

        return $chart;
    }
}