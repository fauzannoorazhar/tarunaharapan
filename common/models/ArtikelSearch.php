<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Artikel;
use common\models\ArtikelSearch;

/**
 * ArtikelSearch represents the model behind the search form of `common\models\Artikel`.
 */
class ArtikelSearch extends Artikel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['judul', 'isi','gambar','id_status_artikel'], 'safe'],
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
        if (User::isAnggota()) {    
            $query = Artikel::find()->andWhere(['create_by' => Yii::$app->user->identity->id]);
        } else {
            $query = Artikel::find();
        }

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'judul' => $this->judul,
        ]);

        $query
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'id_status_artikel', $this->id_status_artikel])
            ->andFilterWhere(['like', 'isi', $this->isi]);

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
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);        

        return $dataProvider;
    }

    //Query Search Status Artikel Di proses
    public function getQueryProses($params)
    {
        $query = Artikel::find()->where(['id_status_artikel' => StatusArtikel::DIPROSES]);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'judul' => $this->judul,
        ]);

        $query
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $query;
    }

    public function searchProses($params)
    {
        $query = $this->getQueryProses($params);

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

    //Query Search Status Artikel Di Terima
    public function getQueryTerima($params)
    {
        $query = Artikel::find()->where(['id_status_artikel' => StatusArtikel::DITERIMA]);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'judul' => $this->judul,
        ]);

        $query
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $query;
    }

    public function searchTerima($params)
    {
        $query = $this->getQueryTerima($params);

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

    //Query Search Status Artikel Di Tolak
    public function getQueryTolak($params)
    {
        $query = Artikel::find()->where(['id_status_artikel' => StatusArtikel::DITOLAK]);

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'judul' => $this->judul,
        ]);

        $query
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi', $this->isi]);

        return $query;
    }

    public function searchTolak($params)
    {
        $query = $this->getQueryTolak($params);

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
}
