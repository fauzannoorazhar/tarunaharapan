<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "guru".
 *
 * @property integer $id
 * @property string $nama
 * @property string $nip
 * @property string $alamat
 * @property integer $id_mapel
 * @property string $photo
 *
 * @property Mapel $idMapel
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'nip', 'alamat', 'id_mapel'], 'required'],
            [['alamat'], 'string'],
            [['id_mapel'], 'integer'],
            [['nama', 'nip', 'photo'], 'string', 'max' => 255],
            [['id_mapel'], 'exist', 'skipOnError' => true, 'targetClass' => Mapel::className(), 'targetAttribute' => ['id_mapel' => 'id']],
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
            'nip' => 'Nip',
            'alamat' => 'Alamat',
            'id_mapel' => 'Mapel',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapel()
    {
        return $this->hasOne(Mapel::className(), ['id' => 'id_mapel']);
    }

    public static function getJumlah()
    {
        return self::find()->count();
    }
}
