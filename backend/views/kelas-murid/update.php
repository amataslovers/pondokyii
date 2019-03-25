<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KelasMurid */

$this->title = 'Update Kelas Murid: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Kelas Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_KELAS_MURID, 'url' => ['view', 'id' => $model->ID_KELAS_MURID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kelas-murid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
