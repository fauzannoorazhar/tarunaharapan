<?php

namespace common\models;

use Yii;
use yii\helpers\Html;

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
            ['gambar', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
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

    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->gambar == null && !file_exists('@uploads/uploads/'.$this->gambar)){
            return Html::img('@uploads/pictures/logo.png',$htmlOptions);
        } else {
            return Html::img('@uploads/uploads/'. $this->gambar,$htmlOptions);
        }
    }
}
