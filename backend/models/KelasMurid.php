<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kelas_murid".
 *
 * @property int $ID_KELAS_MURID
 * @property string $NIS_MURID
 * @property int $ID_KELAS
 * @property int $ID_SEMESTER
 * @property int $ID_TAHUN_AJARAN
 *
 * @property Kelas $kELAS
 * @property Semester $sEMESTER
 * @property TahunAjaran $tAHUNAJARAN
 * @property Murid $nISMUR
 * @property NilaiAkademik[] $nilaiAkademiks
 */
class KelasMurid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $NAMA_MURID;
    public static function tableName()
    {
        return 'kelas_murid';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KELAS', 'ID_SEMESTER', 'ID_TAHUN_AJARAN'], 'integer'],
            [['NIS_MURID'], 'string', 'max' => 20],
            [['ID_KELAS'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['ID_KELAS' => 'ID_KELAS']],
            [['ID_SEMESTER'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['ID_SEMESTER' => 'ID_SEMESTER']],
            [['ID_TAHUN_AJARAN'], 'exist', 'skipOnError' => true, 'targetClass' => TahunAjaran::className(), 'targetAttribute' => ['ID_TAHUN_AJARAN' => 'ID_TAHUN_AJARAN']],
            [['NIS_MURID'], 'exist', 'skipOnError' => true, 'targetClass' => Murid::className(), 'targetAttribute' => ['NIS_MURID' => 'NIS']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KELAS_MURID' => 'Id  Kelas  Murid',
            'NIS_MURID' => 'Nis  Murid',
            'ID_KELAS' => 'Id  Kelas',
            'ID_SEMESTER' => 'Id  Semester',
            'ID_TAHUN_AJARAN' => 'Id  Tahun  Ajaran',
            'NAMA_MURID' => 'Nama Murid'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKELAS()
    {
        return $this->hasOne(Kelas::className(), ['ID_KELAS' => 'ID_KELAS']);
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
    public function getNilaiAkademiks()
    {
        return $this->hasMany(NilaiAkademik::className(), ['ID_KELAS_MURID' => 'ID_KELAS_MURID']);
    }
}
