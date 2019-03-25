<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\models\Murid;
/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanMurid */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perizinan-murid-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $data = ArrayHelper::map(Murid::find()->all(),'NIS', function ($murid){
        return $murid->NIS . ' - ' . $murid->NAMA;
    }); ?>
    <?= $form->field($model, 'NIS_MURID')->widget(Select2::classname(), [
        'data' => $data,
        'options' => ['placeholder' => 'Pilih Murid ...'],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ])->label('MURID');  ?>

    <?= $form->field($model, 'KETERANGAN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TANGGAL_MULAI')->textInput() ?>

    <?= $form->field($model, 'TANGGAL_AKHIR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'STATUS')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
