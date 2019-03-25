<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Peraturan;

/**
 * PeraturanSearch represents the model behind the search form of `backend\models\Peraturan`.
 */
class PeraturanSearch extends Peraturan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PERATURAN'], 'integer'],
            [['NAMA_PERATURAN', 'SANKSI'], 'safe'],
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
        $query = Peraturan::find();

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
            'ID_PERATURAN' => $this->ID_PERATURAN,
        ]);

        $query->andFilterWhere(['like', 'NAMA_PERATURAN', $this->NAMA_PERATURAN])
            ->andFilterWhere(['like', 'SANKSI', $this->SANKSI]);

        return $dataProvider;
    }
}
