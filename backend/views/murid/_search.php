<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\MuridSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="murid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'NIS') ?>

    <?= $form->field($model, 'NAMA') ?>

    <?= $form->field($model, 'JENIS_KELAMIN') ?>

    <?= $form->field($model, 'TEMPAT_LAHIR') ?>

    <?= $form->field($model, 'TANGGAL_LAHIR') ?>

    <?php // echo $form->field($model, 'ID_AGAMA') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'STATUS_NIKAH') ?>

    <?php // echo $form->field($model, 'NAMA_ASAL_SEKOLAH') ?>

    <?php // echo $form->field($model, 'ALAMAT_ASAL_SEKOLAH') ?>

    <?php // echo $form->field($model, 'TANGGAL_MASUK') ?>

    <?php // echo $form->field($model, 'TANGGAL_KELUAR') ?>

    <?php // echo $form->field($model, 'ANGKATAN') ?>

    <?php // echo $form->field($model, 'FOTO') ?>

    <?php // echo $form->field($model, 'STATUS_AKTIF') ?>

    <?php // echo $form->field($model, 'STATUS_TERIMA') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
