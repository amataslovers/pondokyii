<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\DetailMataPelajaran;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiAkademik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nilai-akademik-form">

    <?php $form = ActiveForm::begin(['action' => 'create']); ?>

    <?php foreach ($modelKelasMurid as $murid) { ?>
        <div class="col-md-4">
            <?= $form->field($modelMurid, 'NIS')->textInput([
                    'value' => $murid->nISMUR->NIS,
                    'disabled' => true,
            ]) ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($modelMurid, 'NAMA')->textInput([
                    'value' => $murid->nISMUR->NAMA,
                    'disabled' => true,
            ]) ?>
        </div>
	
        <?= $form->field($modelNilaiAkademik, 'ID_KELAS_MURID')->hiddenInput([
                'value' => $murid->ID_KELAS_MURID,
                'name' => '_ID_KELAS_MURID[]'
        ])->label(false) ?>

        <?= $form->field($modelNilaiAkademik, 'ID_DETAIL_MATA_PELAJARAN')->hiddenInput([
                'value' => $modelDetailMapel->ID_DETAIL_MATA_PELAJARAN,
                'name' => '_ID_DETAIL_MAPEL[]'
        ])->label(false) ?>

        <div class="col-md-4">
            <?= $form->field($modelNilaiAkademik, 'NILAI')->textInput([
                    'name' => '_NILAI[]',
            ]) ?>
        </div>

    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
