<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblPembayaran;
use frontend\models\TblPembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\TblCama;

/**
 * TblPembayaranController implements the CRUD actions for TblPembayaran model.
 */
class TblPembayaranController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all TblPembayaran models.
     * @return mixed
     */
    public function actionCheck() {
        $cama = TblCama::find()->all();
        if (!empty($cama)) {
            foreach ($cama as $cam) {
                if ($cam->tgl_daftar < date('Y-m-d')) {
                    $pembayaran = TblPembayaran::find()->where(['id_cama' => $cam->id_cama])->one();
                    if (empty($pembayaran)) {
                        $cam->delete();
                    } else if (!empty($pembayaran) && $cam->tgl_daftar < date('Y-m-d')) {
                        $cam->delete();
                    }
                }
            }
        }
        return $this->redirect(['tbl-gelombang/check']);
    }

    public function actionError() {
        return $this->render('error');
    }

    public function actionViewkonfirmasi() {
        if (!Yii::$app->user->can('keuangan')) {
            throw new \yii\web\ForbiddenHttpException;
        }

        $reject = "pending";
        $searchModel = new TblPembayaranSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblPembayaran::find()->where(['status' => $reject]),
        ]);
        return $this->render('viewkonfirmasi', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAprove($id) {
        if (!Yii::$app->user->can('keuangan')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $model = $this->findModel($id);
        $cama = TblCama::find()->where(['id_cama' => $model->id_cama])->one();
        $cama->kelulusan = "pending";
        if ($cama->save()) {
            $notif = new \frontend\models\Notification();
            $notif->id_cama = $cama->id_cama;
            $notif->keterangan = "Pembayaran Anda Telah di Konfirmasi, silahkan mengikuti test selanjutnya";
            $notif->save();
            $model = TblPembayaran::findOne($id);
            $model->status = "aproved";
            $model->save();
            return $this->redirect(['viewaprove']);
        } else {
            return print_r($cama->errors);
        }
    }

    public function actionReject($id) {
        if (!Yii::$app->user->can('keuangan')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $model = $this->findModel($id);
        $cama = TblCama::find()->where(['id_cama' => $model->id_cama])->one();
        $cama->kelulusan = "reject";
        $model = TblPembayaran::findOne($id);
        $model->status = "failed";
        $model->save();
        $notif = new \frontend\models\Notification();
        $notif->id_cama = $cama->id_cama;
        $notif->keterangan = "Pembayaran anda gagal";
        $notif->save();
        return $this->redirect(['viewreject']);
    }

    public function actionViewreject() {
        if (!Yii::$app->user->can('keuangan')) {
            throw new \yii\web\ForbiddenHttpException;
        }

        $reject = "failed";
        $searchModel = new TblPembayaranSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblPembayaran::find()->where(['status' => $reject]),
        ]);
        return $this->render('viewreject', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewpeserta() {
//        if (!Yii::$app->user->can('keuangan')) {
//            throw new \yii\web\ForbiddenHttpException;
//        }

        $reject = "aproved";
        $searchModel = new TblPembayaranSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblPembayaran::find()->where(['status' => $reject]),
        ]);
        return $this->render('viewpeserta', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewaprove() {
        if (!Yii::$app->user->can('keuangan')) {
            throw new \yii\web\ForbiddenHttpException;
        }

        $reject = "aproved";
        $searchModel = new TblPembayaranSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblPembayaran::find()->where(['status' => $reject]),
        ]);
        return $this->render('viewapprove', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex() {
        $searchModel = new TblPembayaranSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPembayaran model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view_1', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionBack($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionConfirm() {
        return $this->render('viewconfirm');
    }

    /**
     * Creates a new TblPembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TblPembayaran();
        $cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $foto = \yii\web\UploadedFile::getInstance($model, 'foto');
            $model->id_cama = $cama->id_cama;
            $model->status = "pending";
            $model->save();
            $model->foto = $model->id_pembayaran . '.' . $foto->extension;
            $foto->saveAs('../../buktipembayaran/' . $model->id_pembayaran . '.' . $foto->extension);
            if ($model->save()) {
                \Yii::$app->getSession()->setFlash('success', 'Bukti pembayaran anda telah di simpan, tunggu konfirmasi selanjutnya');
                return $this->redirect(['view', 'id' => $model->id_pembayaran]);
            } else {
                print_r($model->errors);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblPembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        $cama = TblCama::find()->where(['id_account' => Yii::$app->user->id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $foto = \yii\web\UploadedFile::getInstance($model, 'foto');
            $model->id_cama = $cama->id_cama;
            $model->status = "pending";
            $model->save();
            $model->foto = $model->id_pembayaran . '.' . $foto->extension;
            $foto->saveAs('../../buktipembayaran/' . $model->id_pembayaran . '.' . $foto->extension);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id_pembayaran]);
            } else {
                print_r($model->errors);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblPembayaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblPembayaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
