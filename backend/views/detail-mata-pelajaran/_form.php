<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Guru;
use backend\models\Kelas;
use backend\models\MataPelajaran;
use backend\models\Semester;
use backend\models\TahunAjaran;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailMataPelajaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-mata-pelajaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $dataGuru = ArrayHelper::map(Guru::find()->all(),'NIP', function ($guru){
        return 'NIP : ' . $guru->NIP . ' || ' . 'Nama : ' . $guru->GELAR_DEPAN . ' ' . $guru->NAMA . ' ' . $guru->GELAR_BELAKANG;
    }); ?>
    <?= $form->field($model, 'NIP_GURU')->widget(Select2::classname(), [
        'data' => $dataGuru,
        'options' => ['placeholder' => 'Pilih Guru ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Guru');  ?>

    <?php $dataMapel = ArrayHelper::map(MataPelajaran::find()->all(),'ID_MATA_PELAJARAN', function ($mapel){
        return 'Kode : ' . $mapel->KODE_MAPEL . ' || ' . 'Nama : ' . $mapel->NAMA;
    }); ?>
    <?= $form->field($model, 'ID_MATA_PELAJARAN')->widget(Select2::classname(), [
        'data' => $dataMapel,
        'options' => ['placeholder' => 'Pilih Mapel ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Mata Pelajaran');  ?>

    <?php $dataKelas = ArrayHelper::map(Kelas::find()->all(),'ID_KELAS', function ($kelas){
        return 'Jurusan : ' . $kelas->NAMA . ' || ' . 'Kelas : ' . $kelas->KODE;
    }, 'NAMA'); ?>
    <?= $form->field($model, 'ID_KELAS')->widget(Select2::classname(), [
        'data' => $dataKelas,
        'options' => ['placeholder' => 'Pilih Kelas ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Kelas');  ?>

    <?php $dataSemester = ArrayHelper::map(Semester::find()->orderBy('STATUS DESC')->all(),'ID_SEMESTER', function ($sems){
        if($sems->STATUS){
            return 'Semester : ' . $sems->NAMA . ' || ' . 'Aktif';
        }else{
            return 'Semester : ' . $sems->NAMA . ' || ' . 'Nonaktif';
        }
    }); ?>
    <?= $form->field($model, 'ID_SEMESTER')->widget(Select2::classname(), [
        'data' => $dataSemester,
        'options' => ['placeholder' => 'Pilih Semester ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Semester');  ?>


    <?php $dataTahunAjaran = ArrayHelper::map(TahunAjaran::find()->orderBy('STATUS DESC')->all(),'ID_TAHUN_AJARAN', function ($tahun){
        if($tahun->STATUS){
            return 'Tahun Ajaran : ' . $tahun->NAMA . ' || ' . 'Aktif';
        }else{
            return 'Tahun Ajaran : ' . $tahun->NAMA . ' || ' . 'Nonaktif';
        }
    }); ?>
    <?= $form->field($model, 'ID_TAHUN_AJARAN')->widget(Select2::classname(), [
        'data' => $dataTahunAjaran,
        'options' => ['placeholder' => 'Pilih Tahun Ajaran ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Tahun Ajaran');  ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
