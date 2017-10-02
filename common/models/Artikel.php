<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use yii\db\Expression;
use yii\db\ActiveRecord;
use common\models\User;
use common\models\StatusArtikel;
use kartik\rating\StarRating;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "artikel".
 *
 * @property integer $id
 * @property string $id_user
 * @property string $judul
 * @property string $isi
 * @property string $tanggal
 */
class Artikel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artikel';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_by',
                'updatedByAttribute' => null,
                    'value' => function ($event) {
                        return User::getUser();
                },
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
                'immutable' => true,
                'ensureUnique' => true,
            ],
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['judul'],'unique','message' => '{attribute} Artikel Sudah Ada'],
            [['judul', 'isi','id_tag_artikel'], 'required','message' => '{attribute} Tidak Boleh Kosong'],
            [['isi'], 'string'],
            [['judul'], 'string', 'max' => 50],
            /*[['rating'],'safe'],*/
            [['id_status_artikel','populer'], 'safe'],
            [['gambar','slug'], 'string', 'max' => 255],
            ['gambar', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
            [['create_by'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['create_by' => 'id']],
            [['update_by'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['update_by' => 'id']],
            [['id_tag_artikel'], 'exist', 'skipOnError' => true, 'targetClass' => TagArtikel::className(), 'targetAttribute' => ['id_tag_artikel' => 'id']],
            /*['gambar', 'image', 'extensions' => 'png', 'jpg', 'jpeg', 'gif',
                'minWidth' => 100, 'maxWidth' => 1000,
                'minHeight' => 100, 'maxHeight' => 1000,
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul Artikel',
            'isi' => 'Isi Artikel',
            'id_status_artikel' => 'Status',
            'id_tag_artikel' => 'Tag Artikel',
            'slug' => 'Slug',
            'gambar' => 'Gambar',
            'populer' => 'Populer',
            'create_by' => 'Dibuat Oleh',
            'update_by' => 'Dirubah Oleh',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
        ];
    }

    public function getTagArtikel()
    {
        return $this->hasOne(TagArtikel::className(), ['id' => 'id_tag_artikel']);
    }

    public function getRating()
    {
        return $this->hasMany(Rating::className(), ['id_artikel' => 'id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'create_by']);
    }

    public function getStatusArtikel()
    {
        return $this->hasOne(StatusArtikel::className(), ['id' => 'id_status_artikel']);
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

    public function getGaleriArtikel()
    {
        return $this->hasMany(GaleriArtikel::className(), ['id_artikel' => 'id']);
    }

    public static function getCountLabelArtikelProses()
    {
        $semuaArtikelProses = self::find()->where(['id_status_artikel' => StatusArtikel::DIPROSES])->all();
        $artikelProses = self::find()->joinWith('statusArtikel')->where(['id_status_artikel' => StatusArtikel::DIPROSES])->count();

        if ($semuaArtikelProses == null) {
            return '<span class="label label-info">0</span>';
        } else {
            return '<span class="label label-warning">'. $artikelProses .'</span>';
        }
    }

    public static function getArtikelProsesNotif()
    {
        $semuaArtikelProses = self::find()->where(['id_status_artikel' => StatusArtikel::DIPROSES])->all();
        $artikelProses = self::find()->joinWith('statusArtikel')->where(['id_status_artikel' => StatusArtikel::DIPROSES])->count();

        if ($semuaArtikelProses == null) {
            return '<li class="header">Tidak Ada Artikel Yang Diajukan</li>';
        } else {
            return '<li class="header">Ada '. $artikelProses .' Artikel Menunggu Diproses</li>';
        }
    }

    public static function findArtikelProses()
    {
        return self::find()->joinWith('statusArtikel')->where(['id_status_artikel' => StatusArtikel::DIPROSES])->all();
    }

    public function getAnggota()
    {
        return $this
        ->hasOne(Anggota::className(),['id' => 'nama_anggota'])
        ->via('user');
    }

    //Melakukan Sebuah Aksi Untuk Menset Data Sebelum Disimpan
    /*public function beforeSave($insert) 
    {
        
        if($insert){
            $this->id_user = Yii::$app->user->identity->username;
            $this->tanggal = date('Y-m-d');
        }
        return parent::beforeSave($insert);
    }*/

    public function getGambar($htmlOptions=[])
    {
        //Jika file ada dalam direktori
        if($this->gambar == null && !file_exists('@uploads/uploads/'.$this->gambar)){
            return Html::img('@uploads/pictures/logo.png',$htmlOptions);
        } else {
            return Html::img('@uploads/uploads/'. $this->gambar,$htmlOptions);
        }
    }

    public static function findArtikelLimit()
    {
        return static::find()
        ->limit(20)
        ->where(['id_status_artikel' => StatusArtikel::DITERIMA])
        ->orderBy(['id' => SORT_DESC])
        ->all();
    }

    public function findArtikelNotId()
    {
        return static::find()
        ->limit(10)
        ->orderBy(['id' => SORT_DESC])
        ->andWhere(['id_status_artikel' => StatusArtikel::DITERIMA, 'id_tag_artikel' => $this->id_tag_artikel])
        ->andWhere(['not', ['id' => $this->id]])
        ->all();
    }

    public static function findArtikelBulanIni()
    {
        $awal = strtotime(date('Y-m').'-01');
        $akhir = strtotime(date('Y-m-t'));

        return self::find()
            ->andWhere(['>=', 'create_at', $awal])
            ->andWhere(['<=', 'create_at', $akhir])
            ->all();
    }

    /*public function findRatingById()
    {
        return Rating::find()
        ->where(['id_artikel' => $this->id])
        ->all();
    }

    public function getJumlahRating()
    {
        return Rating::find()
        ->where(['id_artikel' => 38])
        ->sum('rating');
    }

    public function getPembagi()
    {
        return Rating::find()
        ->where(['id_artikel' => 38])
        ->count();
    }*/

    public function getStatus()
    {
        if($this->id_status_artikel == StatusArtikel::DIPROSES) {
            return '<h5><span class="label label-success label-lg">Artikel Diproses</span></h5>';
        } elseif ($this->id_status_artikel == StatusArtikel::DITERIMA) {
            return '<h5><span class="label label-primary">Artikel Diterima</span></h5>';
        } elseif ($this->id_status_artikel == StatusArtikel::DITOLAK) {
            return '<h5><span class="label label-danger">Artikel Ditolak</span></h5>';
        }
    }

    public static function getArtikelProses()
    {
        return static::find()
        ->where(['id_status_artikel' => StatusArtikel::DIPROSES, 'create_by' => User::getUser()])
        ->count();
    }

    public static function getArtikelDiterima()
    {
        return static::find()
        ->where(['id_status_artikel' => StatusArtikel::DITERIMA, 'create_by' => User::getUser()])
        ->count();
    }

    public static function getArtikelDitolak()
    {
        return static::find()
        ->where(['id_status_artikel' => StatusArtikel::DITOLAK, 'create_by' => User::getUser()])
        ->count();
    }

    public static function getArtikelProsesAll()
    {
        return static::find()
        ->where(['id_status_artikel' => StatusArtikel::DIPROSES])
        ->count();
    }

    public static function getArtikelDiterimaAll()
    {
        return static::find()
        ->where(['id_status_artikel' => StatusArtikel::DITERIMA])
        ->count();
    }

    public static function getArtikelDitolakAll()
    {
        return static::find()
        ->where(['id_status_artikel' => StatusArtikel::DITOLAK])
        ->count();
    }

    public function labelTag()
    {
        switch ($this->id_tag_artikel) {
            case '1':
                return '<span class="fa fa-tags"></span> Informasi';
                break;
            case '2':
                return '<span class="fa fa-tags"></span> Teknologi';
                break;
            case '3':
                return '<span class="fa fa-tags"></span> Jurusan';
                break;
            case '4':
                return '<span class="fa fa-tags"></span> Umum';
                break;
            case '5':
                return '<span class="fa fa-tags"></span> Kegiatan';
                break;
            case '6':
                return '<span class="fa fa-tags"></span> Tips';
                break;
            case '7':
                return '<span class="fa fa-tags"></span> Eksul';
                break;
            default:
                return '<span class="fa fa-tags"></span> Lainnya';
                break;
        }
    }

    /*public function afterDelete()
    {
        if (User::isOperator()) {
            $pemeriksaan = new Pemeriksaan();
            $pemeriksaan->nama = User::getNamaUser();
            $pemeriksaan->hapus = 'Menghapus Artikel '.$this->anggota->nama.' Judul '.$this->judul.' Status Artikel '.$this->statusArtikel->nama;
            $pemeriksaan->tanggal = date('Y-m-d H:i:s');
            $pemeriksaan->save(false);
        }

        parent::afterDelete();
    }*/

    /*public function getRata()
    {
       $rate = Rating::find()
                ->where(['id_artikel' => $this->id])
                ->sum('rating');

        $count = Rating::find()
            ->where(['id_artikel' => 38])
            ->count();

        if($count == 0){
            return 0;
        } else {
            $jumlah = $rate/$count;
        }

        return Artikel::getIconRating(number_format($jumlah,0));
    }   

    public static function getIconRating($rate)
    {
        if ($rate == 5) {
            return 
            StarRating::widget([
                'name' => 'rating_35',
                'value' => 5,
                'pluginOptions' => [
                    'displayOnly' => true,
                    'size' => 'xs'
                ],
            ]);
        } elseif ($rate == 4) {
            return 
            StarRating::widget([
                'name' => 'rating_35',
                'value' => 4,
                'pluginOptions' => [
                    'displayOnly' => true,
                    'size' => 'xs'
                ],
            ]);
        } elseif ($rate == 3) {
            StarRating::widget([
                'name' => 'rating_35',
                'value' => 3,
                'pluginOptions' => [
                    'displayOnly' => true,
                    'size' => 'xs'
                ],
            ]);
        } elseif ($rate == 2) {
            StarRating::widget([
                'name' => 'rating_35',
                'value' => 2,
                'pluginOptions' => [
                    'displayOnly' => true,
                    'size' => 'xs'
                ],
            ]);
        } elseif ($rate == 1) {
            StarRating::widget([
                'name' => 'rating_35',
                'value' => 1,
                'pluginOptions' => [
                    'displayOnly' => true,
                    'size' => 'xs'
                ],
            ]);
        } else {
            StarRating::widget([
                'name' => 'rating_35',
                'value' => 0,
                'pluginOptions' => [
                    'displayOnly' => true,
                    'size' => 'xs'
                ],
            ]);
        }
    }*/
}
