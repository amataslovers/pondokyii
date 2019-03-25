<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "agama".
 *
 * @property int $ID_AGAMA
 * @property string $NAMA
 *
 * @property Guru[] $gurus
 * @property KeluargaMurid[] $keluargaMurs
 * @property Murid[] $murs
 * @property TenagaUmum[] $tenagaUmums
 */
class Agama extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agama';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_AGAMA' => 'Id  Agama',
            'NAMA' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGurus()
    {
        return $this->hasMany(Guru::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeluargaMurs()
    {
        return $this->hasMany(KeluargaMurid::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMurs()
    {
        return $this->hasMany(Murid::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenagaUmums()
    {
        return $this->hasMany(TenagaUmum::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }
}
