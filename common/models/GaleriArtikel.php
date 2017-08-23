<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "galeri_artikel".
 *
 * @property integer $id
 * @property integer $id_artikel
 * @property string $gambar
 *
 * @property Artikel $idArtikel
 */
class GaleriArtikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'galeri_artikel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel','gambar'], 'safe'],
            [['id_artikel'], 'integer'],
            [['gambar'], 'string', 'max' => 255],
            /*[['gambar'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],*/
            ['gambar', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif']],
            [['id_artikel'], 'exist', 'skipOnError' => true, 'targetClass' => Artikel::className(), 'targetAttribute' => ['id_artikel' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_artikel' => 'Id Artikel',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtikel()
    {
        return $this->hasOne(Artikel::className(), ['id' => 'id_artikel']);
    }
}
