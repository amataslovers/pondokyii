<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Murid */

$this->title = $model->NAMA;
$this->params['breadcrumbs'][] = ['label' => 'Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->NIS], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->NIS], [
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
            'NIS',
            'NAMA',
            'JENIS_KELAMIN',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'ID_AGAMA',
            'ALAMAT:ntext',
            'EMAIL:email',
            'STATUS_NIKAH',
            'NAMA_ASAL_SEKOLAH',
            'ALAMAT_ASAL_SEKOLAH:ntext',
            'TANGGAL_MASUK',
            'TANGGAL_KELUAR',
            'ANGKATAN',
            // 'FOTO',
            [
                'attribute' => 'FOTO',
                'value' => Html::img(Yii::getAlias('@web').'/uploads/foto/'.$model->FOTO, ['alt'=>'Foto Profil', 'class'=>'img-circle', 'height'=>'100px', 'width'=>'100px']),
                'format' => ['raw']
            ],
            'STATUS_AKTIF',
            'STATUS_TERIMA',
        ],
    ]) ?>

    <div class="row">
        <h2>Keluarga Murid <?php echo $model->NAMA; ?></h2>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Jenis</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Pekerjaan</th>
            </tr>
            <?php foreach ($dataKeluarga as $value) { ?>
                
                <tr>
                    <td><?= $value->jENISKELUARGA->NAMA ?></td>
                    <td><?= $value->NAMA ?></td>
                    <td><?= $value->TEMPAT_LAHIR ?></td>
                    <td><?= $value->TANGGAL_LAHIR ?></td>
                    <td><?= $value->ALAMAT ?></td>
                    <td><?= $value->NOTELP ?></td>
                    <td><?= $value->PEKERJAAN ?></td>
                </tr>

            <?php } ?>
        </table>
    </div>

</div>
