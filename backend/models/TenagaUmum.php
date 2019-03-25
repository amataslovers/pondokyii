<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "tenaga_umum".
 *
 * @property string $NIP
 * @property string $NAMA
 * @property string $JENIS_KELAMIN
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property int $ID_AGAMA
 * @property string $ALAMAT
 * @property string $NOTELP
 * @property string $EMAIL
 * @property string $FOTO
 *
 * @property Agama $aGAMA
 */
class TenagaUmum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tenaga_umum';
    }

    /**
     * @inheritdoc
     */

    public $IMAGE_FILE;

    public function rules()
    {
        return [
            [['NIP'], 'required'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['ID_AGAMA'], 'integer'],
            [['ALAMAT'], 'string'],
            [['NIP'], 'string', 'max' => 30],
            [['NAMA'], 'string', 'max' => 190],
            [['JENIS_KELAMIN'], 'string', 'max' => 2],
            [['TEMPAT_LAHIR', 'EMAIL'], 'string', 'max' => 50],
            [['NOTELP'], 'string', 'max' => 13],
            [['FOTO'], 'string', 'max' => 100],
            [['NIP'], 'unique'],
            [['ID_AGAMA'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['ID_AGAMA' => 'ID_AGAMA']],
            [['IMAGE_FILE'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NIP' => 'Nip',
            'NAMA' => 'Nama',
            'JENIS_KELAMIN' => 'Jenis  Kelamin',
            'TEMPAT_LAHIR' => 'Tempat  Lahir',
            'TANGGAL_LAHIR' => 'Tanggal  Lahir',
            'ID_AGAMA' => 'Id  Agama',
            'ALAMAT' => 'Alamat',
            'NOTELP' => 'Notelp',
            'EMAIL' => 'Email',
            'FOTO' => 'Foto',
            'IMAGE_FILE' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAGAMA()
    {
        return $this->hasOne(Agama::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }

    public function uploadFoto()
    {
        if ($this->validate()) {
            $this->IMAGE_FILE->saveAs(Yii::$app->basePath . '\web\uploads\foto\\' . $this->NIP . '-'. time() . '.' . $this->IMAGE_FILE->extension);
            return true;
        } else {
            return false;
        }
    }
}
