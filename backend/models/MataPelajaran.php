<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "mata_pelajaran".
 *
 * @property int $ID_MATA_PELAJARAN
 * @property string $KODE_MAPEL
 * @property string $NAMA
 * @property string $KKM
 *
 * @property DetailMataPelajaran[] $detailMataPelajarans
 */
class MataPelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mata_pelajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KKM'], 'number'],
            [['KODE_MAPEL'], 'string', 'max' => 10],
            [['NAMA'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_MATA_PELAJARAN' => 'Id  Mata  Pelajaran',
            'KODE_MAPEL' => 'Kode  Mapel',
            'NAMA' => 'Nama',
            'KKM' => 'Kkm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailMataPelajarans()
    {
        return $this->hasMany(DetailMataPelajaran::className(), ['ID_MATA_PELAJARAN' => 'ID_MATA_PELAJARAN']);
    }
}
