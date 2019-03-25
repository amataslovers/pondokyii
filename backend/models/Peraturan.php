<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "peraturan".
 *
 * @property int $ID_PERATURAN
 * @property string $NAMA_PERATURAN
 * @property string $SANKSI
 *
 * @property PelanggaranMurid[] $pelanggaranMurs
 */
class Peraturan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peraturan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAMA_PERATURAN', 'SANKSI'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_PERATURAN' => 'Id  Peraturan',
            'NAMA_PERATURAN' => 'Nama  Peraturan',
            'SANKSI' => 'Sanksi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggaranMurs()
    {
        return $this->hasMany(PelanggaranMurid::className(), ['ID_PERATURAN' => 'ID_PERATURAN']);
    }
}
