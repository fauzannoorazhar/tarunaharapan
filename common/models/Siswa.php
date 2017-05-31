<?php

namespace common\models;

use Yii;

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
            [['nama', 'id_jurusan', 'id_angkatan','nisn'], 'required'],
            [['alamat'], 'string'],
            [['id_jurusan', 'id_angkatan'], 'integer'],
            [['nama', 'photo','nisn'], 'string', 'max' => 255],
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
        ];
    }
}
