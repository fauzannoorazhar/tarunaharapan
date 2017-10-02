<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\Helper;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $id_role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const INACTIVE = 0;
    const ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'],'unique','message'=>'{attribute} Sudah Ada'],
            [['username','password'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['id_role'], 'integer'],
            [['model', 'id_role'],'safe'],
            [['username', 'password'], 'string', 'max' => 255],
            [['model'], 'string', 'max' => 50],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['id_role' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'model' => 'Status',
            'id_role' => 'Role',
            'status' => 'Status',
            'nama_anggota' => 'Nama Anggota',
            'create_at' => 'Bergabung',
            'update_at' => 'Waktu Dirubah',
            'last_login' => 'Terakhir Login',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => null,
            ],
        ];
    }

    public function getArtikel()
    {
        return $this->hasMany(Artikel::className(),['create_by' => 'id']);
    }

    public function getAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id' => 'nama_anggota']);
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

    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'id_role']);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */

    //Menyamakan password yang telah di validate
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    //Encrypte Password 
    public function setPasswordHash()
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        return true;
    }

    //Melakukan syarat kondisi login
    public static function isAdmin()
    {
        if(Yii::$app->user->identity->id_role == 1)
        {
            return true;
        } else {
            return false;
        }
        return false;
    }

    //Melakukan syarat kondisi login
    public static function isOperator()
    {
        if(Yii::$app->user->identity->id_role == 2)
        {
            return true;
        } else {
            return false;
        }
        return false;
    }

    //Melakukan syarat kondisi login
    public static function isAnggota()
    {
        if(Yii::$app->user->identity->id_role == 3)
        {
            return true;
        } else {
            return false;
        }
        return false;
    }

    public static function getNamaUser()
    {
        return Yii::$app->user->identity->username;
    }

    public static function getUser()
    {
        return Yii::$app->user->identity->id;
    }

    public static function getLastLogin()
    {
        return Helper::getWaktuWIB(Helper::convert(Yii::$app->user->identity->last_login, 'datetime'));
    }

    public static function getStatus()
    {
        if (static::INACTIVE) {
            return '<span class="label label-warning"> Akun Belum Aktif </span>';
        } else {
            return '<span class="label label-success"> Akun Telah Aktif </span>';
        }
    }

    /*public function beforeSave($insert)
    {
        if ($insert) {
            $Anggota = new Anggota();    
            $Anggota->nama = $this->username;
            $Anggota->id_jenis_kelamin = 1;
                if ($Anggota->save(false)) {
                    $this->nama_anggota = $Anggota->id;
                }
        }

        return parent::beforeSave($insert);
    }*/

    /*public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->tambah = 'Menambahkan User '.$this->username;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }
        return parent::afterSave($insert, $changedAttributes);
    }*/

}