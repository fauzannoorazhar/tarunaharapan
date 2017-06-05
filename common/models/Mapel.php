<?php

namespace common\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "mapel".
 *
 * @property integer $id
 * @property string $nama
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
            'nama' => 'Nama Mata Pelajaran',
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(Mapel::find()->all(),'id','nama');
    }

    public function getMapel()
    {
        return $this->hasOne(Mapel::className(),['mapel.id'=>'id_mapel']);
    }

    public function getRelationField($relation,$field)
    {
        if(!empty($this->$relation->$field)){
            return $this->$relation->$field;   
        }
        else{
            return null;
        }
    }
}
