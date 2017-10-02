<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemeriksaan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $tambah
 * @property string $pembaruan
 * @property string $hapus
 * @property string $tanggal
 */
class Pemeriksaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pemeriksaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'tambah', 'pembaruan', 'hapus', 'tanggal'], 'required'],
            [['tanggal'], 'safe'],
            [['nama', 'tambah', 'pembaruan', 'hapus'], 'string', 'max' => 255],
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
            'tambah' => 'Tambah',
            'pembaruan' => 'Pembaruan',
            'hapus' => 'Hapus',
            'tanggal' => 'Tanggal',
        ];
    }
}
