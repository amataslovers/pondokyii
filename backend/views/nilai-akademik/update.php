<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NilaiAkademik */

$this->title = 'Update Nilai Akademik: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Akademiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_NILAI_AKADEMIK, 'url' => ['view', 'id' => $model->ID_NILAI_AKADEMIK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nilai-akademik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
