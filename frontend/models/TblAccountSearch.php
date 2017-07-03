<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\TblAccount;

/**
 * TblAccountSearch represents the model behind the search form about `frontend\models\TblAccount`.
 */
class TblAccountSearch extends TblAccount
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_account'], 'integer'],
            [['username', 'password', 'email', 'verification_code', 'verify_status'], 'safe'],
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
        $query = TblAccount::find();

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
            'id_account' => $this->id_account,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'verification_code', $this->verification_code])
            ->andFilterWhere(['like', 'verify_status', $this->verify_status]);

        return $dataProvider;
    }
}
