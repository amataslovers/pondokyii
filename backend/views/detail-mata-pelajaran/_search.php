<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\DetailMataPelajaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-mata-pelajaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_DETAIL_MATA_PELAJARAN') ?>

    <?= $form->field($model, 'NIP_GURU') ?>

    <?= $form->field($model, 'ID_MATA_PELAJARAN') ?>

    <?= $form->field($model, 'ID_KELAS') ?>

    <?= $form->field($model, 'ID_SEMESTER') ?>

    <?php // echo $form->field($model, 'ID_TAHUN_AJARAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
