<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detail_mata_pelajaran".
 *
 * @property int $ID_DETAIL_MATA_PELAJARAN
 * @property string $NIP_GURU
 * @property int $ID_MATA_PELAJARAN
 * @property int $ID_KELAS
 * @property int $ID_SEMESTER
 * @property int $ID_TAHUN_AJARAN
 *
 * @property Guru $nIPGURU
 * @property MataPelajaran $mATAPELAJARAN
 * @property Kelas $kELAS
 * @property Semester $sEMESTER
 * @property TahunAjaran $tAHUNAJARAN
 * @property NilaiAkademik[] $nilaiAkademiks
 */
class DetailMataPelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail_mata_pelajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_MATA_PELAJARAN', 'ID_KELAS', 'ID_SEMESTER', 'ID_TAHUN_AJARAN', 'ID_DETAIL_MATA_PELAJARAN'], 'integer'],
            [['NIP_GURU'], 'string', 'max' => 20],
            [['NIP_GURU'], 'exist', 'skipOnError' => true, 'targetClass' => Guru::className(), 'targetAttribute' => ['NIP_GURU' => 'NIP']],
            [['ID_MATA_PELAJARAN'], 'exist', 'skipOnError' => true, 'targetClass' => MataPelajaran::className(), 'targetAttribute' => ['ID_MATA_PELAJARAN' => 'ID_MATA_PELAJARAN']],
            [['ID_KELAS'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['ID_KELAS' => 'ID_KELAS']],
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
            'ID_DETAIL_MATA_PELAJARAN' => 'Id  Detail  Mata  Pelajaran',
            'NIP_GURU' => 'Nip  Guru',
            'ID_MATA_PELAJARAN' => 'Id  Mata  Pelajaran',
            'ID_KELAS' => 'Id  Kelas',
            'ID_SEMESTER' => 'Id  Semester',
            'ID_TAHUN_AJARAN' => 'Id  Tahun  Ajaran',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNIPGURU()
    {
        return $this->hasOne(Guru::className(), ['NIP' => 'NIP_GURU']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMATAPELAJARAN()
    {
        return $this->hasOne(MataPelajaran::className(), ['ID_MATA_PELAJARAN' => 'ID_MATA_PELAJARAN']);
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
    public function getNilaiAkademiks()
    {
        return $this->hasMany(NilaiAkademik::className(), ['ID_DETAIL_MATA_PELAJARAN' => 'ID_DETAIL_MATA_PELAJARAN']);
    }
}
