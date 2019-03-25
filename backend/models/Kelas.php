<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $ID_KELAS
 * @property string $NAMA
 * @property int $KODE
 *
 * @property KelasMurid[] $kelasMurs
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KODE'], 'required'],
            [['KODE', 'ID_KELAS'], 'integer'],
            [['NAMA'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_KELAS' => 'Id  Kelas',
            'NAMA' => 'Nama',
            'KODE' => 'Kode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMurs()
    {
        return $this->hasMany(KelasMurid::className(), ['ID_KELAS' => 'ID_KELAS']);
    }
}
