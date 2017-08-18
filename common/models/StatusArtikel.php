<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "status_artikel".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Artikel[] $artikels
 */
class StatusArtikel extends \yii\db\ActiveRecord
{
    const DIPROSES = 1 ;
    const DITERIMA = 2 ;
    const DITOLAK = 3 ;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'status_artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikels()
    {
        return $this->hasMany(Artikel::className(), ['id_status_artikel' => 'id']);
    }

    public static function getList()
    {
        return [
        self::DIPROSES=>'Diproses',
        self::DITERIMA=>'Diterima',
        self::DITOLAK=>'Ditolak',
        ];
    }
}
