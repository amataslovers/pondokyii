<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KeluargaMurid */

$this->title = $model->ID_KELUARGA_MURID;
$this->params['breadcrumbs'][] = ['label' => 'Keluarga Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluarga-murid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_KELUARGA_MURID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_KELUARGA_MURID], [
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
            'ID_KELUARGA_MURID',
            'NIS_MURID',
            'NAMA',
            'TANGGAL_LAHIR',
            'TEMPAT_LAHIR',
            'ID_AGAMA',
            'ID_JENIS_KELUARGA',
            'ALAMAT:ntext',
            'NOTELP',
            'PEKERJAAN',
        ],
    ]) ?>

</div>
