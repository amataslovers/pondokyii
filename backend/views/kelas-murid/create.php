<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KelasMurid */

$this->title = 'Create Kelas Murid';
$this->params['breadcrumbs'][] = ['label' => 'Kelas Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kelas-murid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
