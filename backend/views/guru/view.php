<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Guru */

$this->title = $model->NIP;
$this->params['breadcrumbs'][] = ['label' => 'Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-view">

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
            'GELAR_DEPAN',
            'GELAR_BELAKANG',
            'ALAMAT:ntext',
            'ID_AGAMA',
            'TANGGAL_LAHIR',
            'TEMPAT_LAHIR',
            'NOTELP',
            'EMAIL:email',
            'FOTO',
        ],
    ]) ?>

</div>
