<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblGelombang;

/**
 * TblGelombangSearch represents the model behind the search form about `frontend\models\TblGelombang`.
 */
class TblGelombangSearch extends TblGelombang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gelombang'], 'integer'],
            [['tanggal_awal', 'tanggal_akhir', 'judul'], 'safe'],
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
        $query = TblGelombang::find();

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
            'id_gelombang' => $this->id_gelombang,
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul]);

        return $dataProvider;
    }
}
