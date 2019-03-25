<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Agama */

$this->title = 'Create Agama';
$this->params['breadcrumbs'][] = ['label' => 'Agamas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agama-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
