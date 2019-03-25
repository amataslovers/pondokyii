<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "nilai_akademik".
 *
 * @property int $ID_NILAI_AKADEMIK
 * @property int $ID_KELAS_MURID
 * @property int $ID_DETAIL_MATA_PELAJARAN
 * @property int $NILAI
 *
 * @property DetailMataPelajaran $dETAILMATAPELAJARAN
 * @property KelasMurid $iDKELASMUR
 */
class NilaiAkademik extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $NAMA_MURID, $KELAS_MURID, $SEMESTER_MURID, $MATA_PELAJARAN;
    public static function tableName()
    {
        return 'nilai_akademik';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_KELAS_MURID', 'ID_DETAIL_MATA_PELAJARAN', 'NILAI'], 'integer'],
            [['NAMA_MURID', 'KELAS_MURID', 'SEMESTER_MURID', 'MATA_PELAJARAN'], 'safe', 'skipOnEmpty' => true],
            [['ID_DETAIL_MATA_PELAJARAN'], 'exist', 'skipOnError' => true, 'targetClass' => DetailMataPelajaran::className(), 'targetAttribute' => ['ID_DETAIL_MATA_PELAJARAN' => 'ID_DETAIL_MATA_PELAJARAN']],
            [['ID_KELAS_MURID'], 'exist', 'skipOnError' => true, 'targetClass' => KelasMurid::className(), 'targetAttribute' => ['ID_KELAS_MURID' => 'ID_KELAS_MURID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_NILAI_AKADEMIK' => 'Id  Nilai  Akademik',
            'ID_KELAS_MURID' => 'Id  Kelas  Murid',
            'ID_DETAIL_MATA_PELAJARAN' => 'Id  Detail  Mata  Pelajaran',
            'NILAI' => 'Nilai',
            'MATA_PELAJARAN' => 'Mapel',
            'NAMA_MURID' => 'Nama Murid',
            'KELAS_MURID' => 'Kelas Murid',
            'SEMESTER_MURID' => 'Semester Murid'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDETAILMATAPELAJARAN()
    {
        return $this->hasOne(DetailMataPelajaran::className(), ['ID_DETAIL_MATA_PELAJARAN' => 'ID_DETAIL_MATA_PELAJARAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDKELASMUR()
    {
        return $this->hasOne(KelasMurid::className(), ['ID_KELAS_MURID' => 'ID_KELAS_MURID']);
    }
}
