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
            [['username'],'unique'],
            [['username', 'model', 'id_role'], 'required'],
            [['id_role'], 'integer'],
            [['password'],'safe'],
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
            'model' => 'Model',
            'id_role' => 'Role',
            'create_at' => 'Waktu Dibuat',
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
                'updatedAtAttribute' => 'update_at',
            ],
        ];
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
    public static function isSuperAdmin()
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
    public static function isAdmin()
    {
        if(Yii::$app->user->identity->id_role == 2)
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

    public static function getLastLogin()
    {
        return Helper::getWaktuWIB(Helper::convert(Yii::$app->user->identity->last_login, 'datetime'));
    }
}