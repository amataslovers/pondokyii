<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Agama;

/**
 * AgamaSearch represents the model behind the search form of `backend\models\Agama`.
 */
class AgamaSearch extends Agama
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_AGAMA'], 'integer'],
            [['NAMA'], 'safe'],
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
        $query = Agama::find();

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
            'ID_AGAMA' => $this->ID_AGAMA,
        ]);

        $query->andFilterWhere(['like', 'NAMA', $this->NAMA]);

        return $dataProvider;
    }
}
