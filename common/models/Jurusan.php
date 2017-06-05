<?php

namespace common\models;

use Yii;
use yii\Helpers\ArrayHelper;

/**
 * This is the model class for table "jurusan".
 *
 * @property integer $id
 * @property integer $id_angkatan
 * @property string $rpl
 * @property string $akutansi
 * @property string $pemasaran
 * @property string $tsm
 * @property string $tkr
 */
class Jurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_angkatan'], 'required'],
            [['id_angkatan'], 'integer'],
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
            'id_angkatan' => 'Angkatan',
            'nama' => 'Nama Jurusan',
        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(Jurusan::find()->all(),'id','nama');
    }

    public function getAngkatan()
    {
        return $this->hasOne(Angkatan::className(),['angkatan.id'=>'id_angkatan']);
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
