<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "angkatan".
 *
 * @property integer $id
 * @property string $tahun
 *
 * @property JurusanAngkatan[] $jurusanAngkatans
 */
class Angkatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'angkatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tahun'], 'required'],
            [['tahun'], 'safe'],
            [['tahun'],'unique','message'=>'{attribute} Angkatan Sudah Ada'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tahun' => 'Tahun Angkatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJurusanAngkatan()
    {
        return $this->hasMany(JurusanAngkatan::className(), ['id_angkatan' => 'id']);
    }

    public function getSiswa()
    {
        return $this
        ->hasMany(Siswa::className(),['id_jurusan_angkatan' => 'id'])
        ->via('jurusanAngkatan');
    }

    public function getList()
    {
        return ArrayHelper::map(Angkatan::find()->all(),'id','tahun');
    }

    public static function getJumlah()
    {
        return self::find()->count();
    }
}
