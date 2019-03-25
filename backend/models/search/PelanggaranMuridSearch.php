<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PelanggaranMurid;

/**
 * PelanggaranMuridSearch represents the model behind the search form of `backend\models\PelanggaranMurid`.
 */
class PelanggaranMuridSearch extends PelanggaranMurid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PELANGGARAN_MURID', 'ID_PERATURAN'], 'integer'],
            [['NIS_MURID', 'TANGGAL_MELANGGAR', 'KETERANGAN'], 'safe'],
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
        $query = PelanggaranMurid::find();

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
            'ID_PELANGGARAN_MURID' => $this->ID_PELANGGARAN_MURID,
            'ID_PERATURAN' => $this->ID_PERATURAN,
            'TANGGAL_MELANGGAR' => $this->TANGGAL_MELANGGAR,
        ]);

        $query->andFilterWhere(['like', 'NIS_MURID', $this->NIS_MURID])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN]);

        return $dataProvider;
    }
}
