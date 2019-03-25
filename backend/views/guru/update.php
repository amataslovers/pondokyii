<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Guru */

$this->title = 'Update Guru: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Gurus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NIP, 'url' => ['view', 'id' => $model->NIP]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guru-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
