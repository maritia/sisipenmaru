<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblCama;

/**
 * TblCamaSearch represents the model behind the search form about `frontend\models\TblCama`.
 */
class TblCamaSearch extends TblCama
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cama', 'id_sekolah', 'id_account', 'bln_lahir', 'id_gelombang', 'thn_lahir'], 'integer'],
            [['tmp_lahir', 'tgl_lahir', 'thn_tamat', 'agama', 'kd_pos', 'no_hp', 'foto', 'nama', 'alamat', 'kelulusan', 'no_pendaftaran', 'tgl_daftar', 'jk'], 'safe'],
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
        $query = TblCama::find();

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
            'id_cama' => $this->id_cama,
            'id_sekolah' => $this->id_sekolah,
            'id_account' => $this->id_account,
            'bln_lahir' => $this->bln_lahir,
            'thn_tamat' => $this->thn_tamat,
            'id_gelombang' => $this->id_gelombang,
            'tgl_daftar' => $this->tgl_daftar,
            'thn_lahir' => $this->thn_lahir,
        ]);

        $query->andFilterWhere(['like', 'tmp_lahir', $this->tmp_lahir])
            ->andFilterWhere(['like', 'tgl_lahir', $this->tgl_lahir])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'kd_pos', $this->kd_pos])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kelulusan', $this->kelulusan])
            ->andFilterWhere(['like', 'no_pendaftaran', $this->no_pendaftaran])
            ->andFilterWhere(['like', 'jk', $this->jk]);

        return $dataProvider;
    }
}
