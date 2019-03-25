<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PembayaranSpp */

$this->title = $model->ID_PEMBAYARAN_SPP;
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Spps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-spp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PEMBAYARAN_SPP], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_PEMBAYARAN_SPP], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_PEMBAYARAN_SPP',
            'NIS_MURID',
            'ID_SEMESTER',
            'ID_TAHUN_AJARAN',
            'TANGGAL_BAYAR',
            'JENIS_BAYAR',
            'KODE_PEMBAYARAN',
            'KETERANGAN:ntext',
        ],
    ]) ?>

</div>
