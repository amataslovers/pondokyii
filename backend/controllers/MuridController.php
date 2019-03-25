<?php

namespace backend\controllers;

use Yii;
use backend\models\Murid;
use backend\models\search\MuridSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\web\UploadedFile;
use common\models\User;
use backend\models\AuthAssignment;
use backend\models\KeluargaMurid;
use backend\models\JenisKeluarga;
use backend\models\KelasMurid;
use backend\models\Semester;
use backend\models\TahunAjaran;
use backend\models\Kelas;
use backend\models\NilaiAkademik;
use kartik\mpdf\Pdf;

/**
 * MuridController implements the CRUD actions for Murid model.
 */
class MuridController extends Controller
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
            ]
        ];
    }

    /**
     * Lists all Murid models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MuridSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Murid model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $dataKeluarga = KeluargaMurid::findAll(['NIS_MURID' => $id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataKeluarga' => $dataKeluarga,
        ]);
    }

    /**
     * Creates a new Murid model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelMurid = new Murid();
        $modelKeluargaMurid = new KeluargaMurid();
        $modelJenisKeluarga = new JenisKeluarga();
        $modelKelasMurid = new KelasMurid();

        if (Yii::$app->request->post()) {
            $input =  Yii::$app->request->post();

            // Yii::$app->response->format = Response::FORMAT_JSON;
            // VarDumper::dump($input);
            // VarDumper::dump($input['_alamat']);

            $transaction= Yii::$app->db->beginTransaction();
            try {

                $modelMurid->load(Yii::$app->request->post());
                $modelMurid->IMAGE_FILE = UploadedFile::getInstance($modelMurid, 'IMAGE_FILE');
                $modelMurid->FOTO = $modelMurid->NIS . '-'. time() . '.' . $modelMurid->IMAGE_FILE->extension;
                $modelMurid->save();
                if (!$modelMurid->uploadFoto()) {
                    $transaction->rollBack();
                }

                $user = new User();
                $userAkses = new AuthAssignment;

                $user->username = $modelMurid->NIS;
                $user->email = $modelMurid->EMAIL;
                $user->setPassword('pondok');
                $user->generateAuthKey();
                $user->save();

                $userAkses->item_name = 'murid';
                $userAkses->user_id = $user->id;
                $userAkses->created_at = time();
                $userAkses->save(false);

                $semesterAktif = Semester::find()->select('ID_SEMESTER')->where(['status' => 1])->one();
                $tahunAktif = TahunAjaran::find()->select('ID_TAHUN_AJARAN')->where(['status' => 1])->one();
                $modelKelasMurid->NIS_MURID = $modelMurid->NIS;
                $modelKelasMurid->ID_KELAS = $input['KelasMurid']['ID_KELAS'];
                $modelKelasMurid->ID_SEMESTER = $semesterAktif->ID_SEMESTER;
                $modelKelasMurid->ID_TAHUN_AJARAN = $tahunAktif->ID_TAHUN_AJARAN;
                $modelKelasMurid->save();

                if (isset($input['_nama'])) {
                    foreach ($input['_nama'] as $key => $row) {
                        $keluargaMurid = new KeluargaMurid();
                        $keluargaMurid->NIS_MURID = $modelMurid->NIS;
                        $keluargaMurid->NAMA = $input['_nama'][$key];
                        $keluargaMurid->TANGGAL_LAHIR = $input['_tanggal_lahir'][$key];
                        $keluargaMurid->TEMPAT_LAHIR = $input['_tempat_lahir'][$key];
                        $keluargaMurid->ID_AGAMA = $input['_agama_id'][$key];
                        $keluargaMurid->ID_JENIS_KELUARGA = $input['_jenis_keluarga_id'][$key];
                        $keluargaMurid->ALAMAT = $input['_alamat'][$key];
                        $keluargaMurid->NOTELP = $input['_notelp'][$key];
                        $keluargaMurid->PEKERJAAN = $input['_pekerjaan'][$key];
                        $keluargaMurid->save();
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
            'modelMurid' => $modelMurid,
            'modelKeluargaMurid' => $modelKeluargaMurid,
            'modelJenisKeluarga' => $modelJenisKeluarga,
            'modelKelasMurid' => $modelKelasMurid,
        ]);
    }

    /**
     * Updates an existing Murid model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // Yii::$app->response->format = Response::FORMAT_JSON;
        $modelMurid = $this->findModel($id);
        /*$modelKelasMurid = KelasMurid::find()->joinWith('kELAS k')->where(['NIS_MURID' => $modelMurid->NIS])->orderBy('k.kode DESC')->one();*/
        $modelKelasMurid = new KelasMurid();
        $modelKeluargaMurid = new KeluargaMurid();
        $modelJenisKeluarga = new JenisKeluarga();

        if (Yii::$app->request->post()) {
            $transaction= Yii::$app->db->beginTransaction();
            try {

                $modelMurid->load(Yii::$app->request->post());
                $modelMurid->IMAGE_FILE = UploadedFile::getInstance($modelMurid, 'IMAGE_FILE');
                if ($modelMurid->IMAGE_FILE != '') {
                    $modelMurid->deleteFoto();
                    $modelMurid->FOTO = $modelMurid->NIS . '-'. time() . '.' . $modelMurid->IMAGE_FILE->extension;
                    $modelMurid->save();
                    if (!$modelMurid->uploadFoto()) {
                        $transaction->rollBack();
                    }
                }else{
                    $modelMurid->save();
                }

                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }
            return $this->redirect(['view', 'id' => $modelMurid->NIS]);
        }

        return $this->render('update', [
            'modelMurid' => $modelMurid,
            'modelKeluargaMurid' => $modelKeluargaMurid,
            'modelJenisKeluarga' => $modelJenisKeluarga,
            'modelKelasMurid' => $modelKelasMurid,
        ]);
    }

    /**
     * Deletes an existing Murid model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $modelMurid = $this->findModel($id);
        $modelJenisKeluarga = KeluargaMurid::deleteAll(['NIS_MURID' => $modelMurid]);
        $modelKelasMurid = KelasMurid::deleteAll(['NIS_MURID' => $modelMurid]);
        $modelUser = User::findOne(['username'=>$modelMurid->NIS])->delete();
        $modelMurid->deleteFoto();
        $modelMurid->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Murid model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Murid the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Murid::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCetakKartu($nis)
    {
        $dataMurid = Murid::find()->where(['NIS'=>$nis])->one();
        $filename = $dataMurid->NIS.'-'.$dataMurid->NAMA.'.pdf';

        // get your HTML raw content without any layouts or scripts
        $content = $this->renderPartial('_cetakKartu', ['dataMurid'=>$dataMurid]);
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // file name for document
            'filename' => $filename,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Kartu Murid'],
             // call mPDF methods on the fly
            /*'methods' => [ 
                'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>['{PAGENO}'],
            ]*/
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }

    
}
