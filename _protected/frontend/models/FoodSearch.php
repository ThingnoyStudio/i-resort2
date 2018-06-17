<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Food;

/**
 * FoodSearch represents the model behind the search form of `frontend\models\Food`.
 */
class FoodSearch extends Food
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Fid'], 'integer'],
            [['Fname', 'Fprice', 'Fimg'], 'safe'],
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
        $query = Food::find();

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
            'Fid' => $this->Fid,
        ]);

        $query->andFilterWhere(['like', 'Fname', $this->Fname])
            ->andFilterWhere(['like', 'Fprice', $this->Fprice])
            ->andFilterWhere(['like', 'Fimg', $this->Fimg]);

        return $dataProvider;
    }
}
