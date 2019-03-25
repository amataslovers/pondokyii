<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KelasMurid */

$this->title = $model->ID_KELAS_MURID;
$this->params['breadcrumbs'][] = ['label' => 'Kelas Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-murid-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_KELAS_MURID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_KELAS_MURID], [
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
            'ID_KELAS_MURID',
            'NIS_MURID',
            'ID_KELAS',
            'ID_SEMESTER',
            'ID_TAHUN_AJARAN',
        ],
    ]) ?>

</div>
