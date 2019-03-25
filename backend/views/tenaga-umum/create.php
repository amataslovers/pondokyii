<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TenagaUmum */

$this->title = 'Create Tenaga Umum';
$this->params['breadcrumbs'][] = ['label' => 'Tenaga Umums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenaga-umum-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
