<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblPengumuman;

/**
 * TblPengumumanSearch represents the model behind the search form about `frontend\models\TblPengumuman`.
 */
class TblPengumumanSearch extends TblPengumuman {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_pengumuman','status'], 'integer'],
            [['judul', 'deskripsi', 'tgl_berakhir'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = TblPengumuman::find();

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
            'id_pengumuman' => $this->id_pengumuman,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
                ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
                ->andFilterWhere(['like', 'tgl_berakhir', $this->tgl_berakhir]);

        return $dataProvider;
    }

}
