<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "guru".
 *
 * @property string $NIP
 * @property string $NAMA
 * @property string $JENIS_KELAMIN
 * @property string $GELAR_DEPAN
 * @property string $GELAR_BELAKANG
 * @property string $ALAMAT
 * @property int $ID_AGAMA
 * @property string $TANGGAL_LAHIR
 * @property string $TEMPAT_LAHIR
 * @property string $NOTELP
 * @property string $EMAIL
 * @property string $FOTO
 *
 * @property DetailMataPelajaran[] $detailMataPelajarans
 * @property Agama $aGAMA
 */
class Guru extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guru';
    }

    /**
     * @inheritdoc
     */

    public $IMAGE_FILE;

    public function rules()
    {
        return [
            [['NIP'], 'required'],
            [['ALAMAT'], 'string'],
            [['ID_AGAMA'], 'integer'],
            [['TANGGAL_LAHIR'], 'safe'],
            [['NIP'], 'string', 'max' => 20],
            [['NAMA'], 'string', 'max' => 190],
            [['JENIS_KELAMIN'], 'string', 'max' => 2],
            [['GELAR_DEPAN', 'GELAR_BELAKANG', 'TEMPAT_LAHIR'], 'string', 'max' => 50],
            [['NOTELP'], 'string', 'max' => 13],
            [['EMAIL', 'FOTO'], 'string', 'max' => 100],
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
            'GELAR_DEPAN' => 'Gelar  Depan',
            'GELAR_BELAKANG' => 'Gelar  Belakang',
            'ALAMAT' => 'Alamat',
            'ID_AGAMA' => 'Id  Agama',
            'TANGGAL_LAHIR' => 'Tanggal  Lahir',
            'TEMPAT_LAHIR' => 'Tempat  Lahir',
            'NOTELP' => 'Notelp',
            'EMAIL' => 'Email',
            'FOTO' => 'Foto',
            'IMAGE_FILE' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailMataPelajarans()
    {
        return $this->hasMany(DetailMataPelajaran::className(), ['NIP_GURU' => 'NIP']);
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
            $this->IMAGE_FILE->saveAs(Yii::$app->basePath . '\web\uploads\foto\\' . $this->FOTO);
            return true;
        } else {
            return false;
        }
    }
}
