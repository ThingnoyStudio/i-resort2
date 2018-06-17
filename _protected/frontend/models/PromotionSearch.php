<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Promotion;

/**
 * PromotionSearch represents the model behind the search form of `frontend\models\Promotion`.
 */
class PromotionSearch extends Promotion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Pid'], 'integer'],
            [['Pname', 'Pdatestart', 'Pdateend', 'Pdistant', 'Ping'], 'safe'],
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
        $query = Promotion::find();

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
            'Pid' => $this->Pid,
        ]);

        $query->andFilterWhere(['like', 'Pname', $this->Pname])
            ->andFilterWhere(['like', 'Pdatestart', $this->Pdatestart])
            ->andFilterWhere(['like', 'Pdateend', $this->Pdateend])
            ->andFilterWhere(['like', 'Pdistant', $this->Pdistant])
            ->andFilterWhere(['like', 'Ping', $this->Ping]);

        return $dataProvider;
    }
}
