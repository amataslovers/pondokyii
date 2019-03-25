<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanMurid */

$this->title = 'Update Perizinan Murid: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PERIZINAN_MURID, 'url' => ['view', 'id' => $model->ID_PERIZINAN_MURID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perizinan-murid-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
