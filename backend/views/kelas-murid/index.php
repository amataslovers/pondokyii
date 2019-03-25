<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
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

            'ID_KELAS_MURID',
            'NIS_MURID',
            'ID_KELAS',
            'ID_SEMESTER',
            'ID_TAHUN_AJARAN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
