<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblCama;
use frontend\models\TblCamaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\AsalSekolah;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * TblCamaController implements the CRUD actions for TblCama model.
 */
class TblCamaController extends Controller {

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
     * Lists all TblCama models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TblCamaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblCama model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        if (!Yii::$app->user->can('student')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblCama model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (!Yii::$app->user->can('student')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $gelombang = \frontend\models\TblGelombang::find()->where(['status' => 'ongoing'])->one();
        if (empty($gelombang)) {
            return $this->render('error');
        }

        $model = new TblCama();
        $items = ArrayHelper::map(AsalSekolah::find()->all(), 'id', 'nama_sekolah');
        $model->id_account = \Yii::$app->user->id;
        $model->kelulusan = "pending";
        $model->id_gelombang = $gelombang->id_gelombang;
        if ($model->load(Yii::$app->request->post())) {
            $model->tgl_daftar = (date('Y-m-d', strtotime('+3 day')));
            $model->no_pendaftaran = "PMB" . date('Y') . '0' . Yii::$app->user->id;
            $foto = \yii\web\UploadedFile::getInstance($model, 'foto');
            $model->foto = \Yii::$app->user->id . '.' . $foto->extension;
            $foto->saveAs('../../fotoprofil/' . \Yii::$app->user->id . '.' . $foto->extension);
            if ($model->save()) {
                Yii::$app->getSession()->setFlash(
                        'success', 'Silahkan Isi Data Orangtua Anda'
                );
                return $this->redirect(['tbl-ortu/create']);
            } else
                return $model->errors;
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'items' => $items,
            ]);
        }
    }

    public function actionViewcamalulus() {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $reject = "lulus";
        $searchModel = new TblCamaSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblCama::find()->where(['kelulusan' => $reject]),
        ]);
        return $this->render('lulus', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewcamagagal() {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $reject = "gagal";
        $searchModel = new TblCamaSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblCama::find()->where(['kelulusan' => $reject]),
        ]);
        return $this->render('gagal', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewkonfirmasi() {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $reject = "pending";
        $searchModel = new TblCamaSearch();

        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblCama::find()->where(['kelulusan' => $reject]),
        ]);
        return $this->render('viewkonfirmasi', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionApprove($id) {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $cama = TblCama::findOne($id);
        $cama->kelulusan = "lulus";
        if ($cama->save()) {
            $oldnotif = \frontend\models\Notification::find()->where(['id_cama' => $cama->id_cama, 'keterangan' => 'Anda Lulus'])->one();
            if (!empty($oldnotif)) {
                $this->redirect(['notification/delete', 'id' => $oldnotif->id_notif]);
            }
            $notif = new \frontend\models\Notification();
            $notif->id_cama = $cama->id_cama;
            $notif->keterangan = "Anda Lulus";
            $notif->save();
            return $this->redirect(['viewcamalulus']);
        } else {
            return print_r($cama->errors);
        }
    }

    public function actionReject($id) {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $cama = TblCama::findOne($id);
        $cama->kelulusan = "gagal";
        if ($cama->save()) {
            $notif = new \frontend\models\Notification();
            $notif->id_account = $cama->id_cama;
            $notif->keterangan = "Anda tidak Lulus";
            $notif->save();
            return $this->redirect(['viewcamagagal']);
        } else {
            return print_r($cama->errors);
        }
    }

    /**
     * Updates an existing TblCama model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if (!Yii::$app->user->can('student')) {
            throw new \yii\web\ForbiddenHttpException;
        }

        $model = $this->findModel($id);
        $items = ArrayHelper::map(AsalSekolah::find()->all(), 'id', 'nama_sekolah');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->foto == '') {
                $foto = \yii\web\UploadedFile::getInstance($model, 'foto');
                $model->foto = \Yii::$app->user->id . '.' . $foto->extension;
                $foto->saveAs('../../fotoprofil/' . \Yii::$app->user->id . '.' . $foto->extension);
                $model->save();
            }

            return $this->redirect(['view', 'id' => $model->id_cama]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'items' => $items,
            ]);
        }
    }

    /**
     * Deletes an existing TblCama model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblCama model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblCama the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblCama::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
