<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\NilaiAkademik */

$this->title = 'Create Nilai Akademik';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Akademiks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-akademik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelNilaiAkademik' => $modelNilaiAkademik,
        'modelKelasMurid' => $modelKelasMurid,
        'modelDetailMapel' => $modelDetailMapel,
        'modelMurid' => $modelMurid,
    ]) ?>

</div>
