<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jenis_keluarga".
 *
 * @property int $ID_JENIS_KELUARGA
 * @property string $NAMA
 *
 * @property KeluargaMurid[] $keluargaMurs
 */
class JenisKeluarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_keluarga';
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
            'ID_JENIS_KELUARGA' => 'Id  Jenis  Keluarga',
            'NAMA' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeluargaMurs()
    {
        return $this->hasMany(KeluargaMurid::className(), ['ID_JENIS_KELUARGA' => 'ID_JENIS_KELUARGA']);
    }
}
