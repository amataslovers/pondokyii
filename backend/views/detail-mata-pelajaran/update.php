<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailMataPelajaran */

$this->title = 'Update Detail Mata Pelajaran: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Detail Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DETAIL_MATA_PELAJARAN, 'url' => ['view', 'id' => $model->ID_DETAIL_MATA_PELAJARAN]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-mata-pelajaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
