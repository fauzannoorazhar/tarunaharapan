<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Rating;

/**
 * RatingSearch represents the model behind the search form of `common\models\Rating`.
 */
class RatingSearch extends Rating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_artikel'], 'integer'],
            [['rating'], 'number'],
            [['ip_user'], 'safe'],
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
        $query = Rating::find();

        $this->load($params);

        // add conditions that should always apply here

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_artikel' => $this->id_artikel,
            'rating' => $this->rating,
        ]);

        $query->andFilterWhere(['like', 'ip_user', $this->ip_user]);

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
}
