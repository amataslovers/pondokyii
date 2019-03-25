<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Murid;
use backend\models\Peraturan;

/* @var $this yii\web\View */
/* @var $model backend\models\PelanggaranMurid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggaran-murid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(Murid::find()->all(),'NIS', function ($murid){
        return $murid->NIS . ' - ' . $murid->NAMA;
    }); ?>
    <?= $form->field($model, 'NIS_MURID')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Murid ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('MURID');  ?>

    <?php $data2 = ArrayHelper::map(Peraturan::find()->all(),'ID_PERATURAN', function ($peraturan){
        return $peraturan->NAMA_PERATURAN . ' - ' . $peraturan->SANKSI;
    }); ?>
    <?= $form->field($model, 'ID_PERATURAN')->widget(Select2::classname(), [
        'data' => $data2,
        'options' => ['placeholder' => 'Peraturan & Sanksi ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Peraturan & Sanksi');  ?>

    <?= $form->field($model, 'TANGGAL_MELANGGAR')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
