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
                'updatedByAttribute' => 'update_by',
                    'value' => function ($event) {
                        return User::getNamaUser();
                },
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'judul',
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
            [['judul', 'isi'], 'required'],
            [['isi'], 'string'],
            [['judul'], 'string', 'max' => 50],
            /*[['rating'],'safe'],*/
            [['id_status_artikel'], 'safe'],
            [['gambar','slug'], 'string', 'max' => 255],
            ['gambar', 'file', 'extensions' => ['png', 'jpg', 'jpeg', 'gif'], 'maxSize' => 1024 * 1024 * 2],
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
            /*'rating' => 'Rating Artikel',*/
            'slug' => 'Slug',
            'gambar' => 'Gambar',
            'create_by' => 'Dibuat Oleh',
            'update_by' => 'Dirubah Oleh',
            'create_at' => 'Waktu Dibuat',
            'update_at' => 'Waktu Dirubah',
        ];
    }

    public function getRating()
    {
        return $this->hasMany(Rating::className(), ['id_artikel' => 'id']);
    }

    public function getStatusArtikel()
    {
        return $this->hasOne(StatusArtikel::className(),['id' => 'id_status_artikel']);
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

    public static function findArtikel()
    {
        return static::find()
        ->limit(6)
        ->orderBy(['id' => SORT_DESC])
        ->all();
    }

    public function findRatingById()
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
    }

    public function getStatus()
    {
        if($this->id_status_artikel == StatusArtikel::DIPROSES) {
            return '<h5><span class="label label-success label-lg">Artikel Sedang Diproses</span></h5>';
        } elseif ($this->id_status_artikel == StatusArtikel::DITERIMA) {
            return '<h5><span class="label label-primary">Artikel Telah Diterima</span></h5>';
        } elseif ($this->id_status_artikel == StatusArtikel::DITOLAK) {
            return '<h5><span class="label label-danger">Artikel Ditolak</span></h5>';
        }
    }

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
