<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailMataPelajaran */

$this->title = $model->ID_DETAIL_MATA_PELAJARAN;
$this->params['breadcrumbs'][] = ['label' => 'Detail Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-mata-pelajaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_DETAIL_MATA_PELAJARAN], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_DETAIL_MATA_PELAJARAN], [
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
            'ID_DETAIL_MATA_PELAJARAN',
            'NIP_GURU',
            'ID_MATA_PELAJARAN',
            'ID_KELAS',
            'ID_SEMESTER',
            'ID_TAHUN_AJARAN',
        ],
    ]) ?>

</div>
