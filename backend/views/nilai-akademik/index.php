<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\Kelas;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\NilaiAkademikSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Akademiks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nilai-akademik-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Nilai Akademik', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <p>

        <?= $this->render('_form_get_siswa', [
            'modelKelas' => $modelKelas,
            'modelSemester' => $modelSemester,
            'modelTahunAjaran' => $modelTahunAjaran,
            'modelDetailMapel' => $modelDetailMapel,
        ]) ?>
        
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'ID_NILAI_AKADEMIK',
            [
                'attribute' => 'NAMA_MURID',
                'value' => 'iDKELASMUR.nISMUR.NAMA'
            ],
            [
                'attribute' => 'KELAS_MURID',
                'value' => function ($data)
                {
                    return $data->iDKELASMUR->kELAS->NAMA . ' ' . $data->iDKELASMUR->kELAS->KODE;
                }
            ],
            [
                'attribute' => 'SEMESTER_MURID',
                'value' => 'iDKELASMUR.sEMESTER.NAMA'
            ],
            [
                'attribute' => 'MATA_PELAJARAN',
                'value' => 'dETAILMATAPELAJARAN.mATAPELAJARAN.NAMA'
            ],
            // 'ID_KELAS_MURID',
            // 'ID_DETAIL_MATA_PELAJARAN',
            'NILAI',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
