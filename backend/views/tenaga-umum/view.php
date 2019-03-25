<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TenagaUmum */

$this->title = $model->NIP;
$this->params['breadcrumbs'][] = ['label' => 'Tenaga Umums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenaga-umum-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->NIP], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->NIP], [
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
            'NIP',
            'NAMA',
            'JENIS_KELAMIN',
            'TEMPAT_LAHIR',
            'TANGGAL_LAHIR',
            'ID_AGAMA',
            'ALAMAT:ntext',
            'NOTELP',
            'EMAIL:email',
            'FOTO',
        ],
    ]) ?>

</div>
