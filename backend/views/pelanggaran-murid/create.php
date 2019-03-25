<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PelanggaranMurid */

$this->title = 'Create Pelanggaran Murid';
$this->params['breadcrumbs'][] = ['label' => 'Pelanggaran Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggaran-murid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
