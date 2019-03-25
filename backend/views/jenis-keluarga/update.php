<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JenisKeluarga */

$this->title = 'Update Jenis Keluarga: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Keluargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_JENIS_KELUARGA, 'url' => ['view', 'id' => $model->ID_JENIS_KELUARGA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
