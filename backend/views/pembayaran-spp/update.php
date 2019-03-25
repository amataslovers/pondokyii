<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PembayaranSpp */

$this->title = 'Update Pembayaran Spp: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Spps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PEMBAYARAN_SPP, 'url' => ['view', 'id' => $model->ID_PEMBAYARAN_SPP]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-spp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
