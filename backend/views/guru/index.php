<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\GuruSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gurus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guru-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Guru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'NIP',
            [
                'attribute' => 'NAMA',
                'value' => function ($data)
                {
                    return $data->GELAR_DEPAN . '. ' . $data->NAMA . ', ' . $data->GELAR_BELAKANG;
                }
            ],
            'JENIS_KELAMIN',
            'GELAR_DEPAN',
            'GELAR_BELAKANG',
            //'ALAMAT:ntext',
            //'ID_AGAMA',
            //'TANGGAL_LAHIR',
            //'TEMPAT_LAHIR',
            //'NOTELP',
            //'EMAIL:email',
            //'FOTO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
