<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use mdm\admin\components\Helper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\KeluargaMuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keluarga Murids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluarga-murid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Keluarga Murid', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID_KELUARGA_MURID',
            [
                'attribute' => 'ID_JENIS_KELUARGA',
                'value' => 'jENISKELUARGA.NAMA'
            ],
            /*[
                'attribute' => 'ID_AGAMA',
                'value' => 'aGAMA.NAMA'
            ],*/
            'NIS_MURID',
            'NAMA',
            'TANGGAL_LAHIR',
            'TEMPAT_LAHIR',
            //'ID_AGAMA',
            //'ALAMAT:ntext',
            //'NOTELP',
            //'PEKERJAAN',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn('{view} {update} {delete}'),
                'buttons'=>[
                    'update'=>function ($url, $model){
                        return Html::a('<span class="fa fa-edit"></span>', ['update', 'id'=>$model->NIS_MURID],
                            ['title'=>Yii::t('app', 'update'),
                             'class'=>'btn btn-primary btn-xs',
                             'data-pjax'=>'0']
                            );
                    }
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
