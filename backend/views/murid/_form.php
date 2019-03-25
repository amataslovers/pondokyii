<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Agama;
use backend\models\JenisKeluarga;
use backend\models\Kelas;

/* @var $this yii\web\View */
/* @var $modelMurid backend\models\Murid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="murid-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($modelMurid, 'NIS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelMurid, 'NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelMurid, 'JENIS_KELAMIN')->dropDownList(
            ['L' => 'Laki - Laki', 'P' => 'Perempuan'],
            ['prompt'=>'Pilih Jenis Kelamin']
    ); ?>

    <?= $form->field($modelMurid, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelMurid, 'TANGGAL_LAHIR')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Lahir ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?php $dataAgama = ArrayHelper::map(Agama::find()->all(),'ID_AGAMA','NAMA'); ?>
    <?= $form->field($modelMurid, 'ID_AGAMA')->widget(Select2::classname(), [
        'data' => $dataAgama,
        'options' => ['placeholder' => 'Pilih Agama ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Agama');  ?>

    <?= $form->field($modelMurid, 'ALAMAT')->textarea(['rows' => 6]) ?>

    <?= $form->field($modelMurid, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelMurid, 'STATUS_NIKAH')->dropDownList(
            ['Tidak Menikah' => 'Tidak Menikah', 'Menikah' => 'Menikah'],
            ['prompt'=>'Pilih Status Menikah']
    ); ?>

    <?= $form->field($modelMurid, 'NAMA_ASAL_SEKOLAH')->textInput(['maxlength' => true]) ?>

    <?= $form->field($modelMurid, 'ALAMAT_ASAL_SEKOLAH')->textarea(['rows' => 6]) ?>

    <?= $form->field($modelMurid, 'TANGGAL_MASUK')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Masuk ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($modelMurid, 'TANGGAL_KELUAR')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Keluar ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($modelMurid, 'ANGKATAN')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Lahir ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'minViewMode' => 2,
            'format' => 'yyyy'
        ]
    ]); ?>

    <?php if ($modelMurid->NIS != NULL) { ?>
        <img src="<?php echo Yii::getAlias('@web').'/uploads/foto/'.$modelMurid->FOTO ?>" width="100" height="100">
    <?php } ?>

    <?= $form->field($modelMurid, 'IMAGE_FILE')->fileInput() ?>

    <?= $form->field($modelMurid, 'STATUS_AKTIF')->dropDownList(
            [0 => 'Tidak Aktif', 1 => 'Aktif'],
            ['prompt'=>'Pilih Status Aktif']
    ); ?>

    <?= $form->field($modelMurid, 'STATUS_TERIMA')->dropDownList(
            [0 => 'Tidak Diterima', 1 => 'Diterima'],
            ['prompt'=>'Pilih Status Diterima']
    ); ?>


    <?php if ($modelMurid->NIS == NULL) { ?>

    <div class="form-group col-md-12 panel panel-info">
        <h4 class="panel-heading">Kelas</h4>
        <div class="row panel-body">
            <div class="col-md-12">
                <?php $dataKelas = ArrayHelper::map(Kelas::find()->all(),'ID_KELAS', function ($kelas){
                    return 'Jurusan : ' . $kelas->NAMA . ' || ' . 'Kelas : ' . $kelas->KODE;
                }, 'NAMA'); ?>
                <?= $form->field($modelKelasMurid, 'ID_KELAS')->widget(Select2::classname(), [
                    'data' => $dataKelas,
                    'options' => ['placeholder' => 'Pilih Kelas ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label('Kelas');  ?>
            </div>
        </div>
    </div>

    <div class="form-group col-md-12 panel panel-info">
    <h4 class="panel-heading">Keluarga Murid</h4>
    <div class="row panel-body">
        <div class="col-md-3">
            <?php $dataJenisKeluarga = ArrayHelper::map(JenisKeluarga::find()->all(),'ID_JENIS_KELUARGA','NAMA'); ?>
            <?= $form->field($modelKeluargaMurid, 'ID_JENIS_KELUARGA')->widget(Select2::classname(), [
                'data' => $dataJenisKeluarga,
                'options' => ['placeholder' => 'Pilih Jenis ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Jenis Keluarga');  ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'NAMA')
            ->textInput([
                'maxlength' => true,
                'placeholder' => 'Nama ...',
                'autocomplete' => 'off',
                ])->label('Nama') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'TEMPAT_LAHIR')
            ->textInput([
                'maxlength' => true,
                'placeholder' => 'Tempat Lahir ...',
                'autocomplete' => 'off',
                ])->label('Tempat Lahir') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'TANGGAL_LAHIR')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Tanggal Lahir ...', 'autocomplete' => 'off'],
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-mm-dd'
                ],
            ]); ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'ID_AGAMA')->widget(Select2::classname(), [
                'data' => $dataAgama,
                'options' => ['placeholder' => 'Pilih Agama ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ])->label('Agama');  ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'ALAMAT')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'NOTELP')
            ->textInput([
                'maxlength' => true,
                'placeholder' => 'No Telp ...',
                'autocomplete' => 'off',
                ])->label('No Telp') ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($modelKeluargaMurid, 'PEKERJAAN')
            ->textInput([
                'maxlength' => true,
                'placeholder' => 'Pekerjaan ...',
                'autocomplete' => 'off',
                ])->label('Pekerjaan') ?>
        </div>
<div class="clearfix"></div>

        <div class="form-group col-md-2">
            <button type="button" class="btn btn-info" id="btn-tambah">Tambah</button>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="form-group col-md-12 panel panel-info">
    <h4 class="panel-heading">Daftar Keluarga</h4>
    <div class="row panel-body">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Pekerjaan</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody id="daftar-keluarga">
                
            </tbody>
        </table>
    </div>
</div>

    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
