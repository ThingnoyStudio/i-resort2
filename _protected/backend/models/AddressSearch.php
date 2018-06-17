<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Address;

/**
 * AddressSearch represents the model behind the search form of `backend\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ADid'], 'integer'],
            [['ADnumber', 'ADhome', 'ADsubdistrict', 'ADdistrict', 'ADprovince', 'ADzipcode'], 'safe'],
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
        $query = Address::find();

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
            'ADid' => $this->ADid,
        ]);

        $query->andFilterWhere(['like', 'ADnumber', $this->ADnumber])
            ->andFilterWhere(['like', 'ADhome', $this->ADhome])
            ->andFilterWhere(['like', 'ADsubdistrict', $this->ADsubdistrict])
            ->andFilterWhere(['like', 'ADdistrict', $this->ADdistrict])
            ->andFilterWhere(['like', 'ADprovince', $this->ADprovince])
            ->andFilterWhere(['like', 'ADzipcode', $this->ADzipcode]);

        return $dataProvider;
    }
}
