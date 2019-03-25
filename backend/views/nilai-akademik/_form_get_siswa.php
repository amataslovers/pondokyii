<?php 
use yii\helpers\Html;
use backend\models\Kelas;
use backend\models\Semester;
use backend\models\TahunAjaran;
use backend\models\DetailMataPelajaran;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

?>

<div class="panel-group">
    <div class="panel panel-info">
        <a data-toggle="collapse" href="#collapse1"><div class="panel-heading">
            <h4 class="panel-title">Buat Nilai</h4>
        </div></a>
        <div id="collapse1" class="panel-collapse collapse">
            <div class="row panel-body">
                <div class="col-md-12">
                    <?php $form = ActiveForm::begin(['action' => 'nilai-akademik/get-siswa']); ?>

                    <?php $dataKelas = ArrayHelper::map(Kelas::find()->all(),'ID_KELAS', function ($kelas){
                        return 'Jurusan : ' . $kelas->NAMA . ' || ' . 'Kelas ' . $kelas->KODE;
                    }, 'NAMA'); ?>
                    <?= $form->field($modelKelas, 'ID_KELAS')->widget(Select2::classname(), [
                        'data' => $dataKelas,
                        'options' => ['placeholder' => 'Pilih Kelas ...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ])->label('Kelas');  ?>


                    <?php $dataSemester = ArrayHelper::map(Semester::find()->orderBy('STATUS DESC')->all(),'ID_SEMESTER', function ($sems){
                        if($sems->STATUS){
                            return 'Semester : ' . $sems->NAMA . ' || ' . 'Aktif';
                        }else{
                            return 'Semester : ' . $sems->NAMA . ' || ' . 'Nonaktif';
                        }
                    }); ?>
                    <?= $form->field($modelSemester, 'ID_SEMESTER')->widget(Select2::classname(), [
                        'data' => $dataSemester,
                        'options' => ['placeholder' => 'Pilih Semester ...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ])->label('Semester');  ?>


                    <?php $dataTahunAjaran = ArrayHelper::map(TahunAjaran::find()->orderBy('STATUS DESC')->all(),'ID_TAHUN_AJARAN', function ($tahun){
                        if($tahun->STATUS){
                            return 'Tahun Ajaran : ' . $tahun->NAMA . ' || ' . 'Aktif';
                        }else{
                            return 'Tahun Ajaran : ' . $tahun->NAMA . ' || ' . 'Nonaktif';
                        }
                    }); ?>
                    <?= $form->field($modelTahunAjaran, 'ID_TAHUN_AJARAN')->widget(Select2::classname(), [
                        'data' => $dataTahunAjaran,
                        'options' => ['placeholder' => 'Pilih Tahun Ajaran ...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ])->label('Tahun Ajaran');  ?>

                    <?php if (Yii::$app->user->can('admin') || Yii::$app->user->can('tenagaUmum')) { ?>
                        <?php $dataDetailMapel = ArrayHelper::map(DetailMataPelajaran::find()->all(),'ID_DETAIL_MATA_PELAJARAN', function ($mapel){
                            return 'Guru : ' . $mapel->nIPGURU->NAMA . ' || ' . 'Mapel : ' . $mapel->mATAPELAJARAN->NAMA . ' || ' . 'Kelas ' . $mapel->kELAS->NAMA . $mapel->kELAS->KODE ;
                        }); ?>
                        <?= $form->field($modelDetailMapel, 'ID_DETAIL_MATA_PELAJARAN')->widget(Select2::classname(), [
                            'data' => $dataDetailMapel,
                            'options' => ['placeholder' => 'Pilih Mapel ...'],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ])->label('Mata Pelajaran');  ?>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group panel-footer">
                <?= Html::submitButton('Create Nilai', ['class' => 'btn btn-success']) ?>
            </div>

                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>