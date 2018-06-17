<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `frontend\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Bid'], 'integer'],
            [['Bdate', 'Rid', 'Uid', 'ADid', 'Bnday', 'Bdatein', 'Bdateout', 'Pid'], 'safe'],
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
        $query = Booking::find();

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
            'Bid' => $this->Bid,
        ]);

        $query->andFilterWhere(['like', 'Bdate', $this->Bdate])
            ->andFilterWhere(['like', 'Rid', $this->Rid])
            ->andFilterWhere(['like', 'Uid', $this->Uid])
            ->andFilterWhere(['like', 'ADid', $this->ADid])
            ->andFilterWhere(['like', 'Bnday', $this->Bnday])
            ->andFilterWhere(['like', 'Bdatein', $this->Bdatein])
            ->andFilterWhere(['like', 'Bdateout', $this->Bdateout])
            ->andFilterWhere(['like', 'Pid', $this->Pid]);

        return $dataProvider;
    }
}
