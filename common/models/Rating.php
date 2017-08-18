<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id
 * @property integer $id_artikel
 * @property double $rating
 * @property string $ip_user
 *
 * @property Artikel $idArtikel
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_artikel'], 'required'],
            [['id_artikel'], 'integer'],
            [['rating'], 'number'],
            [['ip_user'], 'string', 'max' => 255],
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
            'rating' => 'Rating',
            'ip_user' => 'Ip User',
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
