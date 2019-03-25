<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KeluargaMurid;

/**
 * KeluargaMuridSearch represents the model behind the search form of `backend\models\KeluargaMurid`.
 */
class KeluargaMuridSearch extends KeluargaMurid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KELUARGA_MURID'], 'integer'],
            [['NIS_MURID', 'NAMA', 'TANGGAL_LAHIR', 'TEMPAT_LAHIR', 'ALAMAT', 'NOTELP', 'PEKERJAAN', 'ID_AGAMA', 'ID_JENIS_KELUARGA'], 'safe'],
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
        $query = KeluargaMurid::find();

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

        $query->joinWith('jENISKELUARGA');

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_KELUARGA_MURID' => $this->ID_KELUARGA_MURID,
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
        ]);

        $query->andFilterWhere(['like', 'NIS_MURID', $this->NIS_MURID])
            ->andFilterWhere(['like', 'keluarga_murid.nama', $this->NAMA])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'NOTELP', $this->NOTELP])
            // ->andFilterWhere(['like', 'agama.NAMA', $this->ID_AGAMA])
            ->andFilterWhere(['like', 'jenis_keluarga.nama', $this->ID_JENIS_KELUARGA])
            ->andFilterWhere(['like', 'PEKERJAAN', $this->PEKERJAAN]);

        return $dataProvider;
    }
}
