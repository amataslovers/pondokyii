<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PerizinanMuridSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perizinan Murids';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perizinan-murid-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perizinan Murid', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PERIZINAN_MURID',
            'NIS_MURID',
            'KETERANGAN',
            'TANGGAL_MULAI',
            'TANGGAL_AKHIR',
            //'STATUS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
