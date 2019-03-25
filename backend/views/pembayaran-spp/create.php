<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PembayaranSpp */

$this->title = 'Create Pembayaran Spp';
$this->params['breadcrumbs'][] = ['label' => 'Pembayaran Spps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-spp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
