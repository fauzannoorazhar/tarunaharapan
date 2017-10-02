<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Siswa;

/**
 * SiswaSearch represents the model behind the search form of `common\models\Siswa`.
 */
class SiswaSearch extends Siswa
{
    public $globalSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'id_jenis_kelamin', 'id_jurusan_angkatan'], 'integer'],
            [['alamat', 'photo','tanggal_lahir','create_by','update_by','create_at','update_at','globalSearch'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */

    public function getQuerySearch($params)
    {
        $query = Siswa::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'id_jenis_kelamin' => $this->id_jenis_kelamin,
            'id_jurusan_angkatan' => $this->id_jurusan_angkatan,
        ]);

        $query->orFilterWhere(['like', 'nama', $this->globalSearch])
            ->orFilterWhere(['like', 'nisn', $this->globalSearch]);

        return $query;
    }
    
    public function search($params)
    {
        $query = $this->getQuerySearch($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }

    public function getQuerySearchAlumni($params)
    {
        $query = Siswa::find()->where(['status' => '2']);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'id_jenis_kelamin' => $this->id_jenis_kelamin,
            'id_jurusan_angkatan' => $this->id_jurusan_angkatan,
        ]);

        $query->orFilterWhere(['like', 'nama', $this->globalSearch])
            ->orFilterWhere(['like', 'nisn', $this->globalSearch]);

        return $query;
    }

    public function searchAlumni($params)
    {
        $query = $this->getQuerySearchAlumni($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort'=> ['defaultOrder' => ['nama' => SORT_ASC]],
        ]);        

        return $dataProvider;
    }

    public function getQuerySearchSiswaAktif($params)
    {
        $query = Siswa::find()->where(['status' => '1']);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'id_jenis_kelamin' => $this->id_jenis_kelamin,
            'id_jurusan_angkatan' => $this->id_jurusan_angkatan,
        ]);

        $query->orFilterWhere(['like', 'nama', $this->globalSearch])
            ->orFilterWhere(['like', 'nisn', $this->globalSearch]);

        return $query;
    }

    public function searchSiswaAktif($params)
    {
        $query = $this->getQuerySearchSiswaAktif($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            'sort'=> ['defaultOrder' => ['nama' => SORT_ASC]],
        ]);        

        return $dataProvider;
    }
}
