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
class Studen extends \yii\db\ActiveRecord
{
    public $students;

    function test( )
    {
        if( is_object($this) )
        {
         // do something for instance method
            echo 'this is an instance call <br />' . "\n";
        }
        else
        {
         // do something different for procedural method
            echo 'this is a procedure call <br />' . "\n";
        }
    }
}