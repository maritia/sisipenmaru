<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Notification;

/**
 * NotificationSearch represents the model behind the search form about `frontend\models\Notification`.
 */
class NotificationSearch extends Notification
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_notif', 'id_cama'], 'integer'],
            [['keterangan'], 'safe'],
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
    public function search($params)
    {
        $query = Notification::find();

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
            'id_notif' => $this->id_notif,
            'id_cama' => $this->id_cama,
        ]);

        $query->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
