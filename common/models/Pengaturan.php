<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pengaturan".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $posisi
 */
class Pengaturan extends \yii\db\ActiveRecord
{
    const SLIDE1 = 1;
    const SLIDEKECIL1 = 2;
    const SLIDE2 = 3;
    const SLIDEKECIL2 = 4;
    const SLIDE3 = 5;
    const SLIDEKECIL3 = 6;

    const BERITA = 7;
    const J_BERITA = 8;
    const INFORMASI = 9;
    const J_INFORMASI = 10;
    const ARTIKEL_PENGETAHUAN = 11;
    const J_ARTIKEL_PENGETAHUAN = 12;
    const PEREKAPAN = 13;
    const J_PEREKAPAN = 14;
    const INFORMASI_SEKOLAH = 15;
    const J_INFORMASI_SEKOLAH = 16;

    const PARALAX_KECIL = 17;
    const PARALAX = 18;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengaturan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['posisi','unique','message' => '{attribute} Sudah Ada'],
            [['nama', 'posisi'], 'required'],
            [['posisi'], 'integer'],
            [['nama'], 'string', 'max' => 500],
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
            'posisi' => 'Posisi',
        ];
    }

    public static function getList()
    {
        return [
            self::SLIDE1 => 'Tulisan Slide Pertama',
            self::SLIDEKECIL1 => 'Tulisan Slide Kecil Pertama',
            self::SLIDE2 => 'Tulisan Slide Kedua',
            self::SLIDEKECIL2 => 'Tulisan Slide Kecil Kedua',
            self::SLIDE3 => 'Tulisan Slide Ketiga',
            self::SLIDEKECIL3 => 'Tulisan Slide Kecil Ketiga',
            self::BERITA => 'Isi Berita',
            self::J_BERITA => 'Judul Berita',
            self::INFORMASI => 'Isi Informasi',
            self::J_INFORMASI => 'Judul Informasi',
            self::ARTIKEL_PENGETAHUAN => 'Isi Artikel Pengetahuan',
            self::J_ARTIKEL_PENGETAHUAN => 'Judul Artikel Pengetahuan',
            self::PEREKAPAN => 'Isi Perekapan',
            self::J_PEREKAPAN => 'Judul Perekapan',
            self::INFORMASI_SEKOLAH => 'Isi Informasi Sekolah',
            self::J_INFORMASI_SEKOLAH => 'Judul Informasi Sekolah',
            self::PARALAX_KECIL => 'Tulisan Paralax Kecil',
            self::PARALAX => 'Tulisan Paralax Besar',
        ];
    }

    public function getStatusPosisi()
    {
        switch ($this->posisi) {
            case self::SLIDE1:
                return 'Tulisan Slide Pertama';
                break;
            case self::SLIDEKECIL1:
                return 'Tulisan Slide Kecil Pertama';
                break;
            case self::SLIDE2:
                return 'Tulisan Slide Kedua';
                break;
            case self::SLIDEKECIL2:
                return 'Tulisan Slide Kecil Kedua';
                break;
            case self::SLIDE3:
                return 'Tulisan Slide Ketiga';
                break;
            case self::SLIDEKECIL3:
                return 'Tulisan Slide Kecil Ketiga';
                break;
            case self::BERITA:
                return 'Isi Berita';
                break;
            case self::J_BERITA:
                return 'Judul Berita';
                break;
            case self::INFORMASI:
                return 'Isi Informasi';
                break;
            case self::J_INFORMASI:
                return 'Judul Informasi';
                break;
            case self::ARTIKEL_PENGETAHUAN:
                return 'Isi Artikel Pengetahuan';
                break;
            case self::J_ARTIKEL_PENGETAHUAN:
                return 'Judul Artikel Pengetahuan';
                break;
            case self::PEREKAPAN:
                return 'Isi Perekapan';
                break;
            case self::J_PEREKAPAN:
                return 'Judul Perekapan';
                break;
            case self::INFORMASI_SEKOLAH:
                return 'Isi Informasi Sekolah';
                break;
            case self::J_INFORMASI_SEKOLAH:
                return 'Judul Informasi Sekolah';
                break;
            case self::PARALAX_KECIL:
                return 'Tulisan Paralax Kecil';
                break;
            default:
                return 'Tulisan Paralax Besar';
                break;
        }
    }
}
