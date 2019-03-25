<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Semester */

$this->title = 'Update Semester: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Semesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_SEMESTER, 'url' => ['view', 'id' => $model->ID_SEMESTER]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="semester-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
