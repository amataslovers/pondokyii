<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PembayaranSpp;

/**
 * PembayaranSppSearch represents the model behind the search form of `backend\models\PembayaranSpp`.
 */
class PembayaranSppSearch extends PembayaranSpp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PEMBAYARAN_SPP', 'ID_SEMESTER', 'ID_TAHUN_AJARAN'], 'integer'],
            [['NIS_MURID', 'TANGGAL_BAYAR', 'JENIS_BAYAR', 'KODE_PEMBAYARAN', 'KETERANGAN'], 'safe'],
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
        $query = PembayaranSpp::find();

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
            'ID_PEMBAYARAN_SPP' => $this->ID_PEMBAYARAN_SPP,
            'ID_SEMESTER' => $this->ID_SEMESTER,
            'ID_TAHUN_AJARAN' => $this->ID_TAHUN_AJARAN,
            'TANGGAL_BAYAR' => $this->TANGGAL_BAYAR,
        ]);

        $query->andFilterWhere(['like', 'NIS_MURID', $this->NIS_MURID])
            ->andFilterWhere(['like', 'JENIS_BAYAR', $this->JENIS_BAYAR])
            ->andFilterWhere(['like', 'KODE_PEMBAYARAN', $this->KODE_PEMBAYARAN])
            ->andFilterWhere(['like', 'KETERANGAN', $this->KETERANGAN]);

        return $dataProvider;
    }
}
