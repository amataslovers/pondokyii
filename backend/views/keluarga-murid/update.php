<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KeluargaMurid */

$this->title = 'Update Keluarga Murid: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Keluarga Murids', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->ID_KELUARGA_MURID, 'url' => ['view', 'id' => $model->ID_KELUARGA_MURID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keluarga-murid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
