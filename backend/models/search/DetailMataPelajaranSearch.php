<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetailMataPelajaran;

/**
 * DetailMataPelajaranSearch represents the model behind the search form of `backend\models\DetailMataPelajaran`.
 */
class DetailMataPelajaranSearch extends DetailMataPelajaran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_DETAIL_MATA_PELAJARAN', 'ID_MATA_PELAJARAN', 'ID_KELAS', 'ID_SEMESTER', 'ID_TAHUN_AJARAN'], 'integer'],
            [['NIP_GURU'], 'safe'],
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
        $query = DetailMataPelajaran::find();

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
            'ID_DETAIL_MATA_PELAJARAN' => $this->ID_DETAIL_MATA_PELAJARAN,
            'ID_MATA_PELAJARAN' => $this->ID_MATA_PELAJARAN,
            'ID_KELAS' => $this->ID_KELAS,
            'ID_SEMESTER' => $this->ID_SEMESTER,
            'ID_TAHUN_AJARAN' => $this->ID_TAHUN_AJARAN,
        ]);

        $query->andFilterWhere(['like', 'NIP_GURU', $this->NIP_GURU]);

        return $dataProvider;
    }
}
