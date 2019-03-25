<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Agama */

$this->title = 'Update Agama: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_AGAMA, 'url' => ['view', 'id' => $model->ID_AGAMA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agama-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
