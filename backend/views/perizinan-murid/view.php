<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PerizinanMurid */

$this->title = $model->ID_PERIZINAN_MURID;
$this->params['breadcrumbs'][] = ['label' => 'Perizinan Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perizinan-murid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PERIZINAN_MURID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_PERIZINAN_MURID], [
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
            'ID_PERIZINAN_MURID',
            'NIS_MURID',
            'KETERANGAN',
            'TANGGAL_MULAI',
            'TANGGAL_AKHIR',
            'STATUS',
        ],
    ]) ?>

</div>
