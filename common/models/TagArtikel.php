<?php

namespace common\models;

use Yii;
use yii\Helpers\ArrayHelper;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "tag_artikel".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Artikel[] $artikels
 */
class TagArtikel extends \yii\db\ActiveRecord
{
    const INFORMASI = 1;
    const TEKNOLOGI = 2;
    const JURUSAN = 3;
    const UMUM = 4;
    const KEGIATAN = 5;
    const TIPS = 6;
    const ESKUL = 7;
    const LAINNYA = 8;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama','slug'], 'string', 'max' => 50],
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
            'slug' => 'Slug',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'nama',
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikels()
    {
        return $this->hasMany(Artikel::className(), ['id_tag_artikel' => 'id']);
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(),'id','nama');
    }

    //Count Artikel Dengan Relasi Ke TagArtikel
    public function getJumlahArtikel()
    {
        return $this->hasMany(Artikel::className(), ['id_tag_artikel' => 'id'])->where(['id_status_artikel' => StatusArtikel::DITERIMA])->count();
    }
}
