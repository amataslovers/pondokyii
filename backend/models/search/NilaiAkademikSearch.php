<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\NilaiAkademik;

/**
 * NilaiAkademikSearch represents the model behind the search form of `backend\models\NilaiAkademik`.
 */
class NilaiAkademikSearch extends NilaiAkademik
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NILAI'], 'integer'],
            [['NAMA_MURID', 'KELAS_MURID', 'SEMESTER_MURID', 'MATA_PELAJARAN'], 'safe'],
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
            $query = NilaiAkademik::find();
        }else{
            $query = NilaiAkademik::find()->where(['murid.NIS' => Yii::$app->user->identity->username]);
        }

        // add conditions that should always apply here
        $query->joinWith(['iDKELASMUR.nISMUR', 'iDKELASMUR.sEMESTER', 'dETAILMATAPELAJARAN.mATAPELAJARAN']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['NAMA_MURID'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['murid.nama' => SORT_ASC],
            'desc' => ['murid.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['KELAS_MURID'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['kelas_murid.nama' => SORT_ASC],
            'desc' => ['kelas_murid.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['MATA_PELAJARAN'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['mata_pelajaran.nama' => SORT_ASC],
            'desc' => ['mata_pelajaran.nama' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['SEMESTER_MURID'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['semester.nama' => SORT_ASC],
            'desc' => ['semester.nama' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'ID_NILAI_AKADEMIK' => $this->ID_NILAI_AKADEMIK,
            'ID_KELAS_MURID' => $this->ID_KELAS_MURID,
            'ID_DETAIL_MATA_PELAJARAN' => $this->ID_DETAIL_MATA_PELAJARAN,
            'NILAI' => $this->NILAI,
        ]);

        $query->andFilterWhere(['like', 'murid.nama', $this->NAMA_MURID])
            ->andFilterWhere(['like', 'kelas_murid.nama', $this->KELAS_MURID])
            ->andFilterWhere(['like', 'mata_pelajaran.nama', $this->MATA_PELAJARAN])
            ->andFilterWhere(['like', 'semester.nama', $this->SEMESTER_MURID]);

        return $dataProvider;
    }
}
