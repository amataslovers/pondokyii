<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "perizinan_murid".
 *
 * @property int $ID_PERIZINAN_MURID
 * @property string $NIS_MURID
 * @property string $KETERANGAN
 * @property string $TANGGAL_MULAI
 * @property string $TANGGAL_AKHIR
 * @property string $STATUS
 *
 * @property Murid $nISMUR
 */
class PerizinanMurid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perizinan_murid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TANGGAL_MULAI'], 'safe'],
            [['NIS_MURID'], 'string', 'max' => 20],
            [['KETERANGAN', 'TANGGAL_AKHIR', 'STATUS'], 'string', 'max' => 1],
            [['NIS_MURID'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['NIS_MURID' => 'NIS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PERIZINAN_MURID' => 'Id  Perizinan  Murid',
            'NIS_MURID' => 'Nis  Murid',
            'KETERANGAN' => 'Keterangan',
            'TANGGAL_MULAI' => 'Tanggal  Mulai',
            'TANGGAL_AKHIR' => 'Tanggal  Akhir',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNISMUR()
    {
        return $this->hasOne(Murid::className(), ['NIS' => 'NIS_MURID']);
    }
}
