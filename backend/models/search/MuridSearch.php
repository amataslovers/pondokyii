<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Murid;

/**
 * MuridSearch represents the model behind the search form of `backend\models\Murid`.
 */
class MuridSearch extends Murid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIS', 'NAMA', 'JENIS_KELAMIN', 'TEMPAT_LAHIR', 'TANGGAL_LAHIR', 'ALAMAT', 'EMAIL', 'STATUS_NIKAH', 'NAMA_ASAL_SEKOLAH', 'ALAMAT_ASAL_SEKOLAH', 'TANGGAL_MASUK', 'TANGGAL_KELUAR', 'FOTO', 'STATUS_AKTIF', 'STATUS_TERIMA', 'ID_AGAMA'], 'safe'],
            [['ANGKATAN'], 'integer'],
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
        if (Yii::$app->user->can('admin') || Yii::$app->user->can('tenagaUmum') || Yii::$app->user->can('guru')) {
            $query = Murid::find();
        }else{
            $query = Murid::find()->where(['NIS' => Yii::$app->user->identity->username]);
        }

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

        $query->joinWith('aGAMA');

        // grid filtering conditions
        $query->andFilterWhere([
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
            'TANGGAL_MASUK' => $this->TANGGAL_MASUK,
            'TANGGAL_KELUAR' => $this->TANGGAL_KELUAR,
            'ANGKATAN' => $this->ANGKATAN,
        ]);

        $query->andFilterWhere(['like', 'NIS', $this->NIS])
            ->andFilterWhere(['like', 'murid.nama', $this->NAMA])
            ->andFilterWhere(['like', 'JENIS_KELAMIN', $this->JENIS_KELAMIN])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'STATUS_NIKAH', $this->STATUS_NIKAH])
            ->andFilterWhere(['like', 'NAMA_ASAL_SEKOLAH', $this->NAMA_ASAL_SEKOLAH])
            ->andFilterWhere(['like', 'ALAMAT_ASAL_SEKOLAH', $this->ALAMAT_ASAL_SEKOLAH])
            ->andFilterWhere(['like', 'FOTO', $this->FOTO])
            ->andFilterWhere(['like', 'STATUS_AKTIF', $this->STATUS_AKTIF])
            ->andFilterWhere(['like', 'STATUS_TERIMA', $this->STATUS_TERIMA])
            ->andFilterWhere(['like', 'agama.nama', $this->ID_AGAMA]);

        return $dataProvider;
    }
}
