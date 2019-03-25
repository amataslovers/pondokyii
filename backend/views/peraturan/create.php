<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Peraturan */

$this->title = 'Create Peraturan';
$this->params['breadcrumbs'][] = ['label' => 'Peraturans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peraturan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
