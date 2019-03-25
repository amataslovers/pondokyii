<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PelanggaranMurid */

$this->title = 'Update Pelanggaran Murid: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pelanggaran Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PELANGGARAN_MURID, 'url' => ['view', 'id' => $model->ID_PELANGGARAN_MURID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelanggaran-murid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
