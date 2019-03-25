<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "keluarga_murid".
 *
 * @property int $ID_KELUARGA_MURID
 * @property string $NIS_MURID
 * @property string $NAMA
 * @property string $TANGGAL_LAHIR
 * @property string $TEMPAT_LAHIR
 * @property int $ID_AGAMA
 * @property int $ID_JENIS_KELUARGA
 * @property string $ALAMAT
 * @property string $NOTELP
 * @property string $PEKERJAAN
 *
 * @property Agama $aGAMA
 * @property JenisKeluarga $jENISKELUARGA
 * @property Murid $nISMUR
 */
class KeluargaMurid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keluarga_murid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TANGGAL_LAHIR'], 'safe'],
            [['ID_AGAMA', 'ID_JENIS_KELUARGA'], 'integer'],
            [['ALAMAT'], 'string'],
            [['NIS_MURID'], 'string', 'max' => 20],
            [['NAMA', 'TEMPAT_LAHIR'], 'string', 'max' => 190],
            [['NOTELP'], 'string', 'max' => 13],
            [['PEKERJAAN'], 'string', 'max' => 50],
            [['ID_AGAMA'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['ID_AGAMA' => 'ID_AGAMA']],
            [['ID_JENIS_KELUARGA'], 'exist', 'skipOnError' => true, 'targetClass' => JenisKeluarga::className(), 'targetAttribute' => ['ID_JENIS_KELUARGA' => 'ID_JENIS_KELUARGA']],
            [['NIS_MURID'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['NIS_MURID' => 'NIS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KELUARGA_MURID' => 'Id  Keluarga  Murid',
            'NIS_MURID' => 'Nis  Murid',
            'NAMA' => 'Nama',
            'TANGGAL_LAHIR' => 'Tanggal  Lahir',
            'TEMPAT_LAHIR' => 'Tempat  Lahir',
            'ID_AGAMA' => 'Id  Agama',
            'ID_JENIS_KELUARGA' => 'Id  Jenis  Keluarga',
            'ALAMAT' => 'Alamat',
            'NOTELP' => 'Notelp',
            'PEKERJAAN' => 'Pekerjaan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAGAMA()
    {
        return $this->hasOne(Agama::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJENISKELUARGA()
    {
        return $this->hasOne(JenisKeluarga::className(), ['ID_JENIS_KELUARGA' => 'ID_JENIS_KELUARGA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNISMUR()
    {
        return $this->hasOne(Murid::className(), ['NIS' => 'NIS_MURID']);
    }
}
