<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "murid".
 *
 * @property string $NIS
 * @property string $NAMA
 * @property string $JENIS_KELAMIN
 * @property string $TEMPAT_LAHIR
 * @property string $TANGGAL_LAHIR
 * @property int $ID_AGAMA
 * @property string $ALAMAT
 * @property string $EMAIL
 * @property string $STATUS_NIKAH
 * @property string $NAMA_ASAL_SEKOLAH
 * @property string $ALAMAT_ASAL_SEKOLAH
 * @property string $TANGGAL_MASUK
 * @property string $TANGGAL_KELUAR
 * @property int $ANGKATAN
 * @property string $FOTO
 * @property string $STATUS_AKTIF
 * @property string $STATUS_TERIMA
 *
 * @property KelasMurid[] $kelasMurs
 * @property KeluargaMurid[] $keluargaMurs
 * @property Agama $aGAMA
 * @property PembayaranSpp[] $pembayaranSpps
 * @property PerizinanMurid[] $perizinanMurs
 */
class Murid extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'murid';
    }

    /**
     * @inheritdoc
     */

    public $IMAGE_FILE;

    public function rules()
    {
        return [
            [['NIS', 'NAMA', 'TANGGAL_LAHIR', 'TANGGAL_MASUK', 'TANGGAL_KELUAR', 'ID_AGAMA', 'ANGKATAN', 'ALAMAT', 'ALAMAT_ASAL_SEKOLAH', 'JENIS_KELAMIN', 'TEMPAT_LAHIR', 'EMAIL', 'NAMA_ASAL_SEKOLAH', 'FOTO', 'STATUS_NIKAH', 'STATUS_AKTIF', 'STATUS_TERIMA', 'ID_AGAMA'], 'required'],
            [['TANGGAL_LAHIR', 'TANGGAL_MASUK', 'TANGGAL_KELUAR'], 'safe'],
            [['ID_AGAMA', 'ANGKATAN'], 'integer'],
            [['ALAMAT', 'ALAMAT_ASAL_SEKOLAH'], 'string'],
            [['NIS'], 'string', 'max' => 20],
            [['NAMA'], 'string', 'max' => 190],
            [['JENIS_KELAMIN'], 'string', 'max' => 2],
            [['TEMPAT_LAHIR'], 'string', 'max' => 30],
            [['EMAIL', 'NAMA_ASAL_SEKOLAH', 'FOTO'], 'string', 'max' => 100],
            [['STATUS_NIKAH', 'STATUS_AKTIF', 'STATUS_TERIMA'], 'string', 'max' => 15],
            [['NIS'], 'unique'],
            [['ID_AGAMA'], 'exist', 'skipOnError' => true, 'targetClass' => Agama::className(), 'targetAttribute' => ['ID_AGAMA' => 'ID_AGAMA']],
            [['IMAGE_FILE'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NIS' => 'Nis',
            'NAMA' => 'Nama',
            'JENIS_KELAMIN' => 'Jenis  Kelamin',
            'TEMPAT_LAHIR' => 'Tempat  Lahir',
            'TANGGAL_LAHIR' => 'Tanggal  Lahir',
            'ID_AGAMA' => 'Id  Agama',
            'ALAMAT' => 'Alamat',
            'EMAIL' => 'Email',
            'STATUS_NIKAH' => 'Status  Nikah',
            'NAMA_ASAL_SEKOLAH' => 'Nama  Asal  Sekolah',
            'ALAMAT_ASAL_SEKOLAH' => 'Alamat  Asal  Sekolah',
            'TANGGAL_MASUK' => 'Tanggal  Masuk',
            'TANGGAL_KELUAR' => 'Tanggal  Keluar',
            'ANGKATAN' => 'Angkatan',
            'FOTO' => 'Foto',
            'STATUS_AKTIF' => 'Status  Aktif',
            'STATUS_TERIMA' => 'Status  Terima',
            'IMAGE_FILE' => 'Foto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelasMurs()
    {
        return $this->hasMany(KelasMurid::className(), ['NIS_MURID' => 'NIS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKeluargaMurs()
    {
        return $this->hasMany(KeluargaMurid::className(), ['NIS_MURID' => 'NIS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAGAMA()
    {
        return $this->hasOne(Agama::className(), ['ID_AGAMA' => 'ID_AGAMA']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPembayaranSpps()
    {
        return $this->hasMany(PembayaranSpp::className(), ['NIS_MURID' => 'NIS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerizinanMurs()
    {
        return $this->hasMany(PerizinanMurid::className(), ['NIS_MURID' => 'NIS']);
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

    public function deleteFoto()
    {
        unlink(Yii::$app->basePath . '\web\uploads\foto\\' .$this->FOTO);
        return true;
    }
}
