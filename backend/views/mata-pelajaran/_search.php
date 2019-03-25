<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\MataPelajaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mata-pelajaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_MATA_PELAJARAN') ?>

    <?= $form->field($model, 'KODE_MAPEL') ?>

    <?= $form->field($model, 'NAMA') ?>

    <?= $form->field($model, 'KKM') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
