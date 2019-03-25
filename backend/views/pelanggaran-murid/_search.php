<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PelanggaranMuridSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pelanggaran-murid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_PELANGGARAN_MURID') ?>

    <?= $form->field($model, 'NIS_MURID') ?>

    <?= $form->field($model, 'ID_PERATURAN') ?>

    <?= $form->field($model, 'TANGGAL_MELANGGAR') ?>

    <?= $form->field($model, 'KETERANGAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
