<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tahun_ajaran".
 *
 * @property int $ID_TAHUN_AJARAN
 * @property string $NAMA
 * @property int $STATUS
 *
 * @property KelasMurid[] $kelasMurs
 * @property PembayaranSpp[] $pembayaranSpps
 */
class TahunAjaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tahun_ajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS', 'ID_TAHUN_AJARAN'], 'integer'],
            [['NAMA'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_TAHUN_AJARAN' => 'Id  Tahun  Ajaran',
            'NAMA' => 'Nama',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMurs()
    {
        return $this->hasMany(KelasMurid::className(), ['ID_TAHUN_AJARAN' => 'ID_TAHUN_AJARAN']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaranSpps()
    {
        return $this->hasMany(PembayaranSpp::className(), ['ID_TAHUN_AJARAN' => 'ID_TAHUN_AJARAN']);
    }
}
