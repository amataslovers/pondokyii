<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\KeluargaMuridSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keluarga-murid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_KELUARGA_MURID') ?>

    <?= $form->field($model, 'NIS_MURID') ?>

    <?= $form->field($model, 'NAMA') ?>

    <?= $form->field($model, 'TANGGAL_LAHIR') ?>

    <?= $form->field($model, 'TEMPAT_LAHIR') ?>

    <?php // echo $form->field($model, 'ID_AGAMA') ?>

    <?php // echo $form->field($model, 'ID_JENIS_KELUARGA') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'NOTELP') ?>

    <?php // echo $form->field($model, 'PEKERJAAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
