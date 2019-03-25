<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PembayaranSppSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembayaran-spp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_PEMBAYARAN_SPP') ?>

    <?= $form->field($model, 'NIS_MURID') ?>

    <?= $form->field($model, 'ID_SEMESTER') ?>

    <?= $form->field($model, 'ID_TAHUN_AJARAN') ?>

    <?= $form->field($model, 'TANGGAL_BAYAR') ?>

    <?php // echo $form->field($model, 'JENIS_BAYAR') ?>

    <?php // echo $form->field($model, 'KODE_PEMBAYARAN') ?>

    <?php // echo $form->field($model, 'KETERANGAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
