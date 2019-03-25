<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KeluargaMurid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keluarga-murid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php foreach ($model as $key => $value) { ?>
        
        <?= $form->field($model[$key], '['.$key.']NIS_MURID')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model[$key], '['.$key.']NAMA')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model[$key], '['.$key.']TANGGAL_LAHIR')->textInput() ?>

        <?= $form->field($model[$key], '['.$key.']TEMPAT_LAHIR')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model[$key], '['.$key.']ID_AGAMA')->textInput() ?>

        <?= $form->field($model[$key], '['.$key.']ID_JENIS_KELUARGA')->textInput() ?>

        <?= $form->field($model[$key], '['.$key.']ALAMAT')->textarea(['rows' => 6]) ?>

        <?= $form->field($model[$key], '['.$key.']NOTELP')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model[$key], '['.$key.']PEKERJAAN')->textInput(['maxlength' => true]) ?>
    <?php } ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
