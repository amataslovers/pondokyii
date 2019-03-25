<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Agama;

/* @var $this yii\web\View */
/* @var $model backend\models\TenagaUmum */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenaga-umum-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'NIP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAMA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'JENIS_KELAMIN')->dropDownList(
            ['L' => 'Laki - Laki', 'P' => 'Perempuan'],
            ['prompt'=>'Pilih Jenis Kelamin']
    ); ?>

    <?= $form->field($model, 'TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_LAHIR')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Lahir ...'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>

    <?php $dataAgama = ArrayHelper::map(Agama::find()->all(),'ID_AGAMA','NAMA'); ?>
    <?= $form->field($model, 'ID_AGAMA')->widget(Select2::classname(), [
        'data' => $dataAgama,
        'options' => ['placeholder' => 'Pilih Agama ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('Agama');  ?>

    <?= $form->field($model, 'ALAMAT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'NOTELP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IMAGE_FILE')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
