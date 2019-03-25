<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Murid */

$this->title = 'Update Murid: '. $modelMurid->NAMA;
$this->params['breadcrumbs'][] = ['label' => 'Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $modelMurid->NIS, 'url' => ['view', 'id' => $modelMurid->NIS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="murid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelMurid' => $modelMurid,
        'modelKeluargaMurid' => $modelKeluargaMurid,
        'modelJenisKeluarga' => $modelJenisKeluarga,
        'modelKelasMurid' => $modelKelasMurid,
    ]) ?>

</div>
