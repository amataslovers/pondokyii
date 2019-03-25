<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Murid */

$this->title = 'Create Murid';
$this->params['breadcrumbs'][] = ['label' => 'Murids', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="murid-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'modelMurid' => $modelMurid,
        'modelKeluargaMurid' => $modelKeluargaMurid,
        'modelJenisKeluarga' => $modelJenisKeluarga,
        'modelKelasMurid' => $modelKelasMurid,
    ]) ?>

</div>
<?= $this->registerJsFile(
    '@web/js/tambah-murid.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
); ?>
	
	
