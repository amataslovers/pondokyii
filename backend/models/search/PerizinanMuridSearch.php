<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PerizinanMurid;

/**
 * PerizinanMuridSearch represents the model behind the search form of `backend\models\PerizinanMurid`.
 */
class PerizinanMuridSearch extends PerizinanMurid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PERIZINAN_MURID'], 'integer'],
            [['NIS_MURID', 'KETERANGAN', 'TANGGAL_MULAI', 'TANGGAL_AKHIR', 'STATUS'], 'safe'],
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
        $query = PerizinanMurid::find();

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
            'ID_PERIZINAN_MURID' => $this->ID_PERIZINAN_MURID,
            'TANGGAL_MULAI' => $this->TANGGAL_MULAI,
        ]);

        $query->andFilterWhere(['like', 'NIS_MURID', $this->NIS_MURID])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN])
            ->andFilterWhere(['like', 'TANGGAL_AKHIR', $this->TANGGAL_AKHIR])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
