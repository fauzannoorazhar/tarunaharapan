<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $photo
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama','nip'], 'required'],
            [['alamat'], 'string'],
            [['nama', 'photo','nip'], 'string', 'max' => 255],
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
            'alamat' => 'Alamat',
            'photo' => 'Photo',
            'nip' => 'NIP'
        ];
    }
}
