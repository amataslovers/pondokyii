<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pembayaran_spp".
 *
 * @property int $ID_PEMBAYARAN_SPP
 * @property string $NIS_MURID
 * @property int $ID_SEMESTER
 * @property int $ID_TAHUN_AJARAN
 * @property string $TANGGAL_BAYAR
 * @property string $JENIS_BAYAR
 * @property string $KODE_PEMBAYARAN
 * @property string $KETERANGAN
 *
 * @property Murid $nISMUR
 * @property Semester $sEMESTER
 * @property TahunAjaran $tAHUNAJARAN
 */
class PembayaranSpp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pembayaran_spp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_SEMESTER', 'ID_TAHUN_AJARAN'], 'integer'],
            [['TANGGAL_BAYAR'], 'safe'],
            [['KETERANGAN'], 'string'],
            [['NIS_MURID', 'JENIS_BAYAR'], 'string', 'max' => 20],
            [['KODE_PEMBAYARAN'], 'string', 'max' => 50],
            [['NIS_MURID'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['NIS_MURID' => 'NIS']],
            [['ID_SEMESTER'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['ID_SEMESTER' => 'ID_SEMESTER']],
            [['ID_TAHUN_AJARAN'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAjaran::className(), 'targetAttribute' => ['ID_TAHUN_AJARAN' => 'ID_TAHUN_AJARAN']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PEMBAYARAN_SPP' => 'Id  Pembayaran  Spp',
            'NIS_MURID' => 'Nis  Murid',
            'ID_SEMESTER' => 'Semester',
            'ID_TAHUN_AJARAN' => 'Id  Tahun  Ajaran',
            'TANGGAL_BAYAR' => 'Tanggal  Bayar',
            'JENIS_BAYAR' => 'Jenis  Bayar',
            'KODE_PEMBAYARAN' => 'Kode  Pembayaran',
            'KETERANGAN' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNISMUR()
    {
        return $this->hasOne(Murid::className(), ['NIS' => 'NIS_MURID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSEMESTER()
    {
        return $this->hasOne(Semester::className(), ['ID_SEMESTER' => 'ID_SEMESTER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTAHUNAJARAN()
    {
        return $this->hasOne(TahunAjaran::className(), ['ID_TAHUN_AJARAN' => 'ID_TAHUN_AJARAN']);
    }
}
