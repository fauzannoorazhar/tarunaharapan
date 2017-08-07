<?php

namespace common\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "mapel".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property Guru[] $gurus
 */
class Mapel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mapel';
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
    public function getGuru()
    {
        return $this->hasMany(Guru::className(), ['id_mapel' => 'id']);
    }

    public function getList()
    {
        return ArrayHelper::map(Mapel::find()->all(),'id','nama');
    }
}
