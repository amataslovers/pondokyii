<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\web\JsExpression;
use backend\models\Agama;
use backend\models\Murid;
use backend\models\Semester;
use backend\models\TahunAjaran;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $model backend\models\PembayaranSpp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-spp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $dataMurid = ArrayHelper::map(Murid::find()->all(),'NIS', function ($murid){
        return $murid->NIS . ' - ' . $murid->NAMA;
    }); ?>
    <?= $form->field($model, 'NIS_MURID')->widget(Select2::classname(), [
        'data' => $dataMurid,
        'options' => ['placeholder' => 'Pilih Murid ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Murid');  ?>


    <?php $dataSemester = ArrayHelper::map(Semester::find()->all(),'ID_SEMESTER', 'STATUS', 'NAMA' ); ?>
    <?= $form->field($model, 'ID_SEMESTER')->widget(Select2::classname(), [
        'data' => $dataSemester,
        'options' => ['placeholder' => 'Pilih Semester Aktif ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);  ?>

    <?= $form->field($model, 'ID_TAHUN_AJARAN')->textInput() ?>
    <?php $dataTahunAjaran = ArrayHelper::map(TahunAjaran::find()->all(),'ID_TAHUN_AJARAN', 'NAMA' ); ?>
    <?= $form->field($model, 'ID_TAHUN_AJARAN')->widget(Select2::classname(), [
        'data' => $dataTahunAjaran,
        'options' => ['placeholder' => 'Pilih Tahun Ajaran ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]);  ?>

    <?= $form->field($model, 'TANGGAL_BAYAR')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Bayar ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'JENIS_BAYAR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KODE_PEMBAYARAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'KETERANGAN')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
