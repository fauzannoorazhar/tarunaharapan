<?php

namespace common\models;

use Yii;
use common\models\User;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "jurusan_angkatan".
 *
 * @property integer $id
 * @property integer $id_jurusan
 * @property integer $id_angkatan
 *
 * @property Jurusan $idJurusan
 * @property Angkatan $idAngkatan
 * @property Siswa[] $siswas
 */
class JurusanAngkatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan_angkatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jurusan', 'id_angkatan'], 'unique', 'targetAttribute' => ['id_jurusan', 'id_angkatan'],'message' => '{attribute} Sudah Digunakan'],
            [['id_jurusan', 'id_angkatan'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['id_jurusan', 'id_angkatan'], 'integer'],
            [['slug'],'string', 'max' => 255],
            [['id_jurusan'], 'exist', 'skipOnError' => true, 'targetClass' => Jurusan::className(), 'targetAttribute' => ['id_jurusan' => 'id']],
            [['id_angkatan'], 'exist', 'skipOnError' => true, 'targetClass' => Angkatan::className(), 'targetAttribute' => ['id_angkatan' => 'id']],
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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => ['jurusan.nama','angkatan.tahun'],
                'immutable' => true,
                'ensureUnique' => true,
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
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jurusan' => 'Jurusan',
            'id_angkatan' => 'Angkatan',
            'slug' => 'Slug',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusan()
    {
        return $this->hasOne(Jurusan::className(), ['id' => 'id_jurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(), ['id' => 'id_angkatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswa()
    {
        return $this->hasMany(Siswa::className(), ['id_jurusan_angkatan' => 'id']);
    }

    public static function getList()
    {
        $hasil = [];
        foreach (JurusanAngkatan::find()->all() as $data) {
            $hasil[$data->id] = $data->jurusan->nama.' - '.$data->angkatan->tahun;
        }

        return $hasil;  
    }

    public static function findJurusanAngkatanStatus()
    {
        return self::find()
        ->joinWith(['siswa','jurusan'])
        ->where(['siswa.status' => 2])
        ->orderBy(['id' => SORT_ASC]);
    }

    /*public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->tambah = 'Menambahkan  '.$this->jurusan->nama.' Tahun '.$this->angkatan->tahun;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        } else {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->pembaruan = 'Memperbaharui  '.$this->jurusan->nama.' Tahun '.$this->angkatan->tahun;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }
        return parent::afterSave($insert, $changedAttributes);
    }

    public function afterDelete()
    {
        if (User::isOperator()) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->hapus = 'Menghapus  '.$this->jurusan->nama.' Tahun '.$this->angkatan->tahun;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }

        parent::afterDelete();
    }*/

    public function getCount()
    {
        return Siswa::find()
            ->andWhere(['id_jurusan_angkatan' => $this->id])
            ->count();
    }
}