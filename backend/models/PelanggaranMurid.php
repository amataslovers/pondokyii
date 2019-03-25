<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelanggaran_murid".
 *
 * @property int $ID_PELANGGARAN_MURID
 * @property string $NIS_MURID
 * @property int $ID_PERATURAN
 * @property string $TANGGAL_MELANGGAR
 * @property string $KETERANGAN
 *
 * @property Peraturan $pERATURAN
 * @property Murid $nISMUR
 */
class PelanggaranMurid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggaran_murid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_PERATURAN'], 'integer'],
            [['TANGGAL_MELANGGAR'], 'safe'],
            [['NIS_MURID'], 'string', 'max' => 20],
            [['KETERANGAN'], 'string', 'max' => 200],
            [['ID_PERATURAN'], 'exist', 'skipOnError' => true, 'targetClass' => Peraturan::className(), 'targetAttribute' => ['ID_PERATURAN' => 'ID_PERATURAN']],
            [['NIS_MURID'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['NIS_MURID' => 'NIS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PELANGGARAN_MURID' => 'Id  Pelanggaran  Murid',
            'NIS_MURID' => 'Nis  Murid',
            'ID_PERATURAN' => 'Id  Peraturan',
            'TANGGAL_MELANGGAR' => 'Tanggal  Melanggar',
            'KETERANGAN' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPERATURAN()
    {
        return $this->hasOne(Peraturan::className(), ['ID_PERATURAN' => 'ID_PERATURAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNISMUR()
    {
        return $this->hasOne(Murid::className(), ['NIS' => 'NIS_MURID']);
    }
}
