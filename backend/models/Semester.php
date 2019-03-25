<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "semester".
 *
 * @property int $ID_SEMESTER
 * @property int $NAMA
 * @property int $STATUS
 *
 * @property KelasMurid[] $kelasMurs
 * @property PembayaranSpp[] $pembayaranSpps
 */
class Semester extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semester';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA', 'STATUS'], 'integer'],
            [['ID_SEMESTER'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_SEMESTER' => 'Id  Semester',
            'NAMA' => 'Nama',
            'STATUS' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMurs()
    {
        return $this->hasMany(KelasMurid::className(), ['ID_SEMESTER' => 'ID_SEMESTER']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaranSpps()
    {
        return $this->hasMany(PembayaranSpp::className(), ['ID_SEMESTER' => 'ID_SEMESTER']);
    }
}
