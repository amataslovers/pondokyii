<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KelasMuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kelas Murids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-murid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Kelas Murid', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID_KELAS_MURID',
            'NIS_MURID',
            [
                'attribute' => 'NAMA_MURID',
                'value' => 'nISMUR.NAMA'
            ],
            // 'ID_KELAS',
            [
                'attribute' => 'ID_KELAS',
                'value' => function ($data)
                {
                    return $data->kELAS->NAMA . ' ' . $data->kELAS->KODE;
                }
            ],
            'ID_SEMESTER',
            [
              'attribute' => 'ID_TAHUN_AJARAN',
              'value' => 'tAHUNAJARAN.NAMA'
            ],
            // 'ID_TAHUN_AJARAN',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{cetak-rapot}'),
                'buttons'=>[
                    'cetak-rapot'=>function ($url, $model){
                        return Html::a('<span class="fa fa-print"></span> Cetak Rapot', ['cetak-rapot', 'id'=>$model->ID_KELAS_MURID],
                            ['title'=>Yii::t('app', 'cetak-rapot'),
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
