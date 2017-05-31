<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "alumni".
 *
 * @property integer $id
 * @property string $nama
 * @property string $photo
 * @property integer $id_angkatan
 * @property integer $id_jurusan
 * @property string $alamat
 */
class Alumni extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumni';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'id_angkatan', 'id_jurusan'], 'required'],
            [['id_angkatan', 'id_jurusan'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'photo'], 'string', 'max' => 255],
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
            'photo' => 'Photo',
            'id_angkatan' => 'Angkatan',
            'id_jurusan' => 'Jurusan',
            'alamat' => 'Alamat',
        ];
    }
}
