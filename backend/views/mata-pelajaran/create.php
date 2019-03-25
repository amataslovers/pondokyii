<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MataPelajaran */

$this->title = 'Create Mata Pelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mata-pelajaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
