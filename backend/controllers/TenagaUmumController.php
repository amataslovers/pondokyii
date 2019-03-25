<?php

namespace backend\controllers;

use Yii;
use backend\models\TenagaUmum;
use backend\models\search\TenagaUmumSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\User;
use backend\models\AuthAssignment;

/**
 * TenagaUmumController implements the CRUD actions for TenagaUmum model.
 */
class TenagaUmumController extends Controller
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
     * Lists all TenagaUmum models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TenagaUmumSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TenagaUmum model.
     * @param string $id
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
     * Creates a new TenagaUmum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TenagaUmum();

        if ($model->load(Yii::$app->request->post())) {

            $transaction= Yii::$app->db->beginTransaction();
            try {

                $model->load(Yii::$app->request->post());
                $model->IMAGE_FILE = UploadedFile::getInstance($model, 'IMAGE_FILE');
                $model->FOTO = $model->NIP . '-'. time() . '.' . $model->IMAGE_FILE->extension;
                $model->save();
                if (!$model->uploadFoto()) {
                    $transaction->rollBack();
                }

                $user = new User();
                $userAkses = new AuthAssignment();

                $user->username = $model->NIP;
                $user->email = $model->EMAIL;
                $user->setPassword('gurupondok');
                $user->generateAuthKey();
                $user->save();

                $userAkses->item_name = 'tenagaUmum';
                $userAkses->user_id = $user->id;
                $userAkses->created_at = time();
                $userAkses->save(false);

                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
                throw $e;
            } catch (\Throwable $e) {
                $transaction->rollBack();
                throw $e;
            }

            return $this->redirect(['tenaga-umum/index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TenagaUmum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->NIP]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TenagaUmum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TenagaUmum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return TenagaUmum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TenagaUmum::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
