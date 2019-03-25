<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KelasMurid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kelas-murid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIS_MURID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_KELAS')->textInput() ?>

    <?= $form->field($model, 'ID_SEMESTER')->textInput() ?>

    <?= $form->field($model, 'ID_TAHUN_AJARAN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
