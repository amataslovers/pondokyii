<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\KelasMuridSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-murid-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_KELAS_MURID') ?>

    <?= $form->field($model, 'NIS_MURID') ?>

    <?= $form->field($model, 'ID_KELAS') ?>

    <?= $form->field($model, 'ID_SEMESTER') ?>

    <?= $form->field($model, 'ID_TAHUN_AJARAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
