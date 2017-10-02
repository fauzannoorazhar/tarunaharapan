<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\behaviors\TimestampBehavior;
use common\models\User;

/**
 * This is the model class for table "anggota".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property integer $id_jenis_kelamin
 * @property string $email
 * @property string $tanggal_lahir
 * @property integer $create_at
 * @property integer $last_login
 * @property integer $status
 * @property integer $id_role
 *
 * @property Role $idRole
 */
class Anggota extends \yii\db\ActiveRecord
{
    public $username;
    public $password;
    public $password_konfirmasi;
    /*public $reCaptcha;*/

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            /*[['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LeolSwUAAAAAHPe4jWXr6UfkGvR5MKQ7vBQG53y', 'uncheckedMessage' => 'Please confirm that you are not a bot.'],*/
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '{attribute} Sudah Ada'],
            ['password_konfirmasi', 'validatePassword'],
            [['nama'],'unique','message' => '{attribute} Pengguna Sudah Ada'],
            [['nama', 'alamat', 'id_jenis_kelamin', 'email', 'tanggal_lahir','username','password','password_konfirmasi'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['alamat'], 'string'],
            [['id_jenis_kelamin', 'create_at'], 'integer'],
            [['create_at','bio','photo'], 'safe'],
            [['nama', 'email','photo'], 'string', 'max' => 255],
            [['email'],'email'],
            [['photo'], 'string', 'max' => 255],
            ['photo', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => null,
            ],
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
            'alamat' => 'Alamat',
            'photo' => 'Photo',
            'bio' => 'Bio',
            'id_jenis_kelamin' => 'Jenis Kelamin',
            'email' => 'Email',
            'tanggal_lahir' => 'Tanggal Lahir',
            'create_at' => 'Bergabung',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['nama_anggota' => 'id']);
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

    public function getArtikel()
    {
        return 
        $this->hasMany(Artikel::className(), ['create_by' => 'id'])
        ->via('user');
    }

    //Fungsi Yang Melakukan Perhitungan Jumlah Artikel Dari Relasi
    public function getArtikelCount()
    {
        return $this->getArtikel()->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getJenisKelamin()
    {
        return $this->hasOne(JenisKelamin::className(), ['id' => 'id_jenis_kelamin']);
    }

    public function createUser()
    {
        $user = new User;
        $user->username = $this->username;
        $user->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        $user->model = 'Anggota';
        $user->nama_anggota = $this->id;
        $user->status = 0;
        $user->id_role = 3;

        if ($user->save())
            return true;
        else
                throw new \Exception("Error Processing Request".var_dump($user->errors), 400);
            return true;
    }

    public function sendMailToUser($kode = null)
    {

        $pesan = '
        Dengan Hormat Kepada '.$this->nama.' <br><br>

        Terima Kasih Telah Berpartisipasi Menjadi Anggota Kami<br><br>
        Hubungi Admin Untuk Melakukan Pengaktifan Akun<br><br>
        Setelah Admin Mengaktifkan Lakukan Login Dengan Menggunakan Data Sebagai Berikut : <br><br>
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>'.$this->username.'
            </td>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>'.$this->password.'
            </td>
        </table><br>

        Kami Harap Kepada '.$this->nama.', Dapat Mengikuti Segala Peraturan Yang Telah Kami Berikan. Sekian Dan Selamat Berkarya 
        Dengan Artikel Yang Bermanfaat<br><br>

        Terima Kasih
        <br><br>
        ';

    return Yii::$app->mailer->compose()
        ->setFrom('wlnoor98@gmail.com')
        ->setTo($this->email)
        ->setSubject('Register')
        ->setTextBody('Register')
        ->setHtmlBody($pesan)
        ->send();
    }

    public function sendMailToAdmin()
    {        

            $pesan = '
                Telah mendaftar ke aplikasi Perpustakaan. <a href="#"> klik disini </a> untuk login dan melakukan konfirmasi terkait pendaftar tersebut
                <br><br>
                Terima kasih
            ';   

        $konten = '
            Dengan Hormat, <br><br>
            Pendaftar Aplikasi Sistem Informasi Jasa Konstruksi (SIJAKON) Dengan data sebagai berikut : <br>

            <table>
                <tr>
                    <td>Nama Perusahaan</td>
                    <td>:</td>
                    <td>'.$this->nama.'
                </td>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>'.$this->email.'
                </td>
            </table>

            <br><br>
            '.$pesan.'
        
        ';

        return Yii::$app->mailer->compose()
            ->setFrom('wlnoor98@gmail.com')
            ->setTo('wlnoor98@gmail.com')
            ->setSubject('Pendaftaran SIJAKON')
            ->setTextBody('Pendaftaran')
            ->setHtmlBody($konten)
            ->send();
    }

    public function validatePassword($attribute, $params)
    {
        if($this->password != $this->password_konfirmasi)
        {
            $this->addError($attribute, 'Password konfirmasi tidak sesuai');
        }
    }

    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->photo == null && !file_exists('@uploads/uploads/'.$this->photo) && $this->id_jenis_kelamin !== 1){
            return Html::img('@uploads/pictures/avatar2.png',$htmlOptions);
        } elseif ($this->photo == null && !file_exists('@uploads/uploads/'.$this->photo) && $this->id_jenis_kelamin !== 2) {
            return Html::img('@uploads/pictures/avatar5.png',$htmlOptions);
        } else {
            return Html::img('@uploads/uploads/'. $this->photo,$htmlOptions);
        }
    }

    /*public function afterDelete()
    {
        if (User::isOperator()) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->hapus = 'Menghapus Anggota '.$this->nama;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }

        parent::afterDelete();
    }*/

}
