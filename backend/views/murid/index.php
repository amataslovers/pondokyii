<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\MuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Murids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Murid', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NIS',
            'NAMA',
            // 'JENIS_KELAMIN',
            // 'TEMPAT_LAHIR',
            // 'TANGGAL_LAHIR',
            [
                'attribute' => 'ID_AGAMA',
                'value' => 'aGAMA.NAMA'
            ],
            'ALAMAT:ntext',
            'EMAIL:email',
            // 'STATUS_NIKAH',
            // 'NAMA_ASAL_SEKOLAH',
            // 'ALAMAT_ASAL_SEKOLAH:ntext',
            // 'TANGGAL_MASUK',
            // 'TANGGAL_KELUAR',
            // 'ANGKATAN',
            'FOTO',
            // 'STATUS_AKTIF',
            // 'STATUS_TERIMA',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{view} {update} {delete} {cetak-kartu}'),
                'buttons'=>[
                    'cetak-kartu'=>function ($url, $model){
                        return Html::a('<span class="fa fa-print"></span> Cetak Kartu', ['cetak-kartu', 'nis'=>$model->NIS],
                            ['title'=>Yii::t('app', 'cetak-kartu'),
                             'class'=>'btn btn-primary btn-xs',
                             'target'=>'_blank',
                             'data-pjax'=>'0']
                            );
                    }
                ],

            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
