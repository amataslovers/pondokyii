<?php

namespace backend\controllers;

use Yii;
use backend\models\NilaiAkademik;
use backend\models\search\NilaiAkademikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Murid;
use backend\models\KelasMurid;
use backend\models\Kelas;
use backend\models\Semester;
use backend\models\TahunAjaran;
use backend\models\MataPelajaran;
use backend\models\DetailMataPelajaran;
use yii\web\Response;

/**
 * NilaiAkademikController implements the CRUD actions for NilaiAkademik model.
 */
class NilaiAkademikController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NilaiAkademik models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NilaiAkademikSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modelKelas = new Kelas();
        $modelSemester = new Semester();
        $modelTahunAjaran = new TahunAjaran();
        $modelDetailMapel = new DetailMataPelajaran();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'modelKelas' => $modelKelas,
            'modelSemester' => $modelSemester,
            'modelTahunAjaran' => $modelTahunAjaran,
            'modelDetailMapel' => $modelDetailMapel,
        ]);
    }

    /**
     * Displays a single NilaiAkademik model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new NilaiAkademik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NilaiAkademik();

        // Yii::$app->response->format = Response::FORMAT_JSON;

        if (Yii::$app->request->post()) {
            $input =  Yii::$app->request->post();

            $transaction= Yii::$app->db->beginTransaction();
            try {

                if (isset($input['_ID_KELAS_MURID'])) {
                    foreach ($input['_ID_KELAS_MURID'] as $key => $row) {
                        $modelNilai = new NilaiAkademik();
                        $modelNilai->ID_KELAS_MURID = $input['_ID_KELAS_MURID'][$key];
                        $modelNilai->ID_DETAIL_MATA_PELAJARAN = $input['_ID_DETAIL_MAPEL'][$key];
                        $modelNilai->NILAI = $input['_NILAI'][$key];
                        $modelNilai->save();
                    }
                }

                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }

            return $this->redirect(['murid/index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NilaiAkademik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_NILAI_AKADEMIK]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NilaiAkademik model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NilaiAkademik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NilaiAkademik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NilaiAkademik::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGetSiswa()
    {
        $modelNilaiAkademik = new NilaiAkademik();
        $modelSemester = new Semester();
        $modelTahunAjaran = new TahunAjaran();
        $modelKelas = new Kelas();
        $modelDetailMapel = new DetailMataPelajaran();
        $modelMurid = new Murid();

        // Yii::$app->response->format = Response::FORMAT_JSON;
        if (Yii::$app->request->post()) {
            $modelSemester->load(Yii::$app->request->post());
            $modelTahunAjaran->load(Yii::$app->request->post());
            $modelKelas->load(Yii::$app->request->post());
            $modelDetailMapel->load(Yii::$app->request->post());

            $modelKelasMurid = KelasMurid::find()
                                ->where(['ID_SEMESTER' => $modelSemester->ID_SEMESTER])
                                ->andWhere(['ID_TAHUN_AJARAN' => $modelTahunAjaran->ID_TAHUN_AJARAN])
                                ->andWhere(['ID_KELAS' => $modelKelas->ID_KELAS])
                                ->orderBy('NIS_MURID DESC')->all();

            return $this->render('create', [
                'modelNilaiAkademik' => $modelNilaiAkademik,
                'modelKelasMurid' => $modelKelasMurid,
                'modelDetailMapel' => $modelDetailMapel,
                'modelMurid' => $modelMurid,
            ]);
        }
    }
}
