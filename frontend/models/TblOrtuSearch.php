<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblOrtu;

/**
 * TblOrtuSearch represents the model behind the search form about `frontend\models\TblOrtu`.
 */
class TblOrtuSearch extends TblOrtu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ortu', 'id_cama', 'gaji_ayah', 'gaji_ibu'], 'integer'],
            [['nm_ayah', 'nm_ibu', 'alamat', 'kd_pos', 'pk_ayah', 'pk_ibu'], 'safe'],
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
        $query = TblOrtu::find();

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
            'id_ortu' => $this->id_ortu,
            'id_cama' => $this->id_cama,
            'gaji_ayah' => $this->gaji_ayah,
            'gaji_ibu' => $this->gaji_ibu,
        ]);

        $query->andFilterWhere(['like', 'nm_ayah', $this->nm_ayah])
            ->andFilterWhere(['like', 'nm_ibu', $this->nm_ibu])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kd_pos', $this->kd_pos])
            ->andFilterWhere(['like', 'pk_ayah', $this->pk_ayah])
            ->andFilterWhere(['like', 'pk_ibu', $this->pk_ibu]);

        return $dataProvider;
    }
}
