<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TenagaUmum */

$this->title = 'Update Tenaga Umum: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Tenaga Umums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NIP, 'url' => ['view', 'id' => $model->NIP]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tenaga-umum-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
