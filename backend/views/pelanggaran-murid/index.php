<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PelanggaranMuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggaran Murids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggaran-murid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pelanggaran Murid', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PELANGGARAN_MURID',
            'NIS_MURID',
            'ID_PERATURAN',
            'TANGGAL_MELANGGAR',
            'KETERANGAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
