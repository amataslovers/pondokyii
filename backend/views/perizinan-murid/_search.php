<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\PerizinanMuridSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-murid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_PERIZINAN_MURID') ?>

    <?= $form->field($model, 'NIS_MURID') ?>

    <?= $form->field($model, 'KETERANGAN') ?>

    <?= $form->field($model, 'TANGGAL_MULAI') ?>

    <?= $form->field($model, 'TANGGAL_AKHIR') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
