<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KelasMurid;

/**
 * KelasMuridSearch represents the model behind the search form of `backend\models\KelasMurid`.
 */
class KelasMuridSearch extends KelasMurid
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KELAS_MURID', 'ID_KELAS', 'ID_SEMESTER', 'ID_TAHUN_AJARAN'], 'integer'],
            [['NIS_MURID', 'NAMA_MURID'], 'safe'],
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
            $query = KelasMurid::find();
        }else{
            $query = KelasMurid::find()->where(['NIS_MURID' => Yii::$app->user->identity->username]);
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

        // grid filtering conditions
        $query->andFilterWhere([
            'ID_KELAS_MURID' => $this->ID_KELAS_MURID,
            'ID_KELAS' => $this->ID_KELAS,
            'ID_SEMESTER' => $this->ID_SEMESTER,
            'ID_TAHUN_AJARAN' => $this->ID_TAHUN_AJARAN,
        ]);

        $query->andFilterWhere(['like', 'NIS_MURID', $this->NIS_MURID]);

        return $dataProvider;
    }
}
