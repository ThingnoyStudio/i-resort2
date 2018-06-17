<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Roomtype;

/**
 * RoomtypeSearch represents the model behind the search form of `backend\models\Roomtype`.
 */
class RoomtypeSearch extends Roomtype
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['RTid'], 'integer'],
            [['RTname'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params)
    {
        $query = Roomtype::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'RTid' => $this->RTid,
        ]);

        $query->andFilterWhere(['like', 'RTname', $this->RTname]);

        return $dataProvider;
    }
}
