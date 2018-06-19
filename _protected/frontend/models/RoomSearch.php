<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Room;
use yii\db\Query;

/**
 * RoomSearch represents the model behind the search form of `frontend\models\Room`.
 */
class RoomSearch extends Room
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Rid', 'RSid','RTid'], 'integer'],
            [['Rname', 'Rnumber', 'Rdes', 'Rimg'], 'safe'],
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
//        $query = Room::find();
//        $query = Room::find()->join('INNER JOIN','roomstatus','room.RSid = roomstatus.RSid')
//        ->join('INNER JOIN','roomtype','room.RTid = roomtype.RTid');

        $query = new Query();
        $query->select('*')
            ->from('room')
            ->join('INNER JOIN','roomstatus','room.RSid = roomstatus.RSid')
            ->join('INNER JOIN','roomtype','room.RTid = roomtype.RTid')
            ->all();



        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'p' => $p
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Rid' => $this->Rid,
            'RSid' => $this->RSid,
            'RTid' => $this->RTid,
        ]);

        $query->andFilterWhere(['like', 'Rname', $this->Rname])
            ->andFilterWhere(['like', 'Rnumber', $this->Rnumber])
            ->andFilterWhere(['like', 'Rdes', $this->Rdes])
            ->andFilterWhere(['like', 'Rimg', $this->Rimg]);


        return $dataProvider;
    }
}
