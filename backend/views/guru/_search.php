<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\GuruSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guru-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'NIP') ?>

    <?= $form->field($model, 'NAMA') ?>

    <?= $form->field($model, 'JENIS_KELAMIN') ?>

    <?= $form->field($model, 'GELAR_DEPAN') ?>

    <?= $form->field($model, 'GELAR_BELAKANG') ?>

    <?php // echo $form->field($model, 'ALAMAT') ?>

    <?php // echo $form->field($model, 'ID_AGAMA') ?>

    <?php // echo $form->field($model, 'TANGGAL_LAHIR') ?>

    <?php // echo $form->field($model, 'TEMPAT_LAHIR') ?>

    <?php // echo $form->field($model, 'NOTELP') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'FOTO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
