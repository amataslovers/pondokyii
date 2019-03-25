<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TenagaUmum;

/**
 * TenagaUmumSearch represents the model behind the search form of `backend\models\TenagaUmum`.
 */
class TenagaUmumSearch extends TenagaUmum
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIP', 'NAMA', 'JENIS_KELAMIN', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'ALAMAT', 'NOTELP', 'EMAIL', 'FOTO'], 'safe'],
            [['ID_AGAMA'], 'integer'],
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
        $query = TenagaUmum::find();

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
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
            'ID_AGAMA' => $this->ID_AGAMA,
        ]);

        $query->andFilterWhere(['like', 'NIP', $this->NIP])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA])
            ->andFilterWhere(['like', 'JENIS_KELAMIN', $this->JENIS_KELAMIN])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'NOTELP', $this->NOTELP])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'FOTO', $this->FOTO]);

        return $dataProvider;
    }
}
