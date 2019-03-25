<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\NilaiAkademikSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-akademik-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID_NILAI_AKADEMIK') ?>

    <?= $form->field($model, 'ID_KELAS_MURID') ?>

    <?= $form->field($model, 'ID_DETAIL_MATA_PELAJARAN') ?>

    <?= $form->field($model, 'NILAI') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
