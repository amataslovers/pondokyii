<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KeluargaMurid */

$this->title = 'Create Keluarga Murid';
$this->params['breadcrumbs'][] = ['label' => 'Keluarga Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keluarga-murid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
