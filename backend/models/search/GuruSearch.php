<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Guru;

/**
 * GuruSearch represents the model behind the search form of `backend\models\Guru`.
 */
class GuruSearch extends Guru
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NIP', 'NAMA', 'JENIS_KELAMIN', 'GELAR_DEPAN', 'GELAR_BELAKANG', 'ALAMAT', 'TANGGAL_LAHIR', 'TEMPAT_LAHIR', 'NOTELP', 'EMAIL', 'FOTO'], 'safe'],
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
        if (Yii::$app->user->can('admin') || Yii::$app->user->can('tenagaUmum')) {
            $query = Guru::find();
        }else{
            $query = Guru::find()->where(['NIP' => Yii::$app->user->identity->username]);
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
            'ID_AGAMA' => $this->ID_AGAMA,
            'TANGGAL_LAHIR' => $this->TANGGAL_LAHIR,
        ]);

        $query->andFilterWhere(['like', 'NIP', $this->NIP])
            ->andFilterWhere(['like', 'NAMA', $this->NAMA])
            ->andFilterWhere(['like', 'JENIS_KELAMIN', $this->JENIS_KELAMIN])
            ->andFilterWhere(['like', 'GELAR_DEPAN', $this->GELAR_DEPAN])
            ->andFilterWhere(['like', 'GELAR_BELAKANG', $this->GELAR_BELAKANG])
            ->andFilterWhere(['like', 'ALAMAT', $this->ALAMAT])
            ->andFilterWhere(['like', 'TEMPAT_LAHIR', $this->TEMPAT_LAHIR])
            ->andFilterWhere(['like', 'NOTELP', $this->NOTELP])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL])
            ->andFilterWhere(['like', 'FOTO', $this->FOTO]);

        return $dataProvider;
    }
}
