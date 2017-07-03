<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblGelombang;
use frontend\models\TblGelombangSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Event;

/**
 * TblGelombangController implements the CRUD actions for TblGelombang model.
 */
class TblGelombangController extends Controller {

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
     * Lists all TblGelombang models.
     * @return mixed
     */
    public function actionCheck() {
        $og = "ongoing";
        $glb = TblGelombang::find()->where(['status' => $og])->one();
        if (!empty($glb)) {
            if (date('Y-m-d') > $glb->tanggal_akhir) {
                $glb->status = "pasted";
                $glb->save();
            }
        }
        return $this->redirect(['tbl-pengumuman/check']);
    }

    public function actionIndex() {
        $searchModel = new TblGelombangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (Yii::$app->user->can('akademik')) {
            $model = new TblGelombang();
            $model->status = "ongoing";

            if ($model->load(Yii::$app->request->post())) {
                $glb = TblGelombang::find()->where(['status' => 'ongoing'])->one();
                if (!empty($glb)) {
                    return $this->render('error');
                }
                if ($model->save()) {
                    $event = new Event();
                    $event->judul = $model->judul;
                    $event->deskripsi = 'pendaftaran';
                    $event->tanggal_awal = $model->tanggal_awal;
                    $event->tanggal_akhir = $model->tanggal_akhir;
                    if ($event->save()) {
                        return $this->redirect(['index']);
                    } else {
                        print_r($event->errors);
                    }
                }
            }
            return $this->render('index', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblGelombang model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblGelombang model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $model = new TblGelombang();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $event = new \frontend\models\Event();
            $event->judul = $model->judul;
            $event->deskripsi = 'pendaftaran';
            $event->tanggal_awal = $model->tanggal_awal;
            $event->tanggal_akhir = $model->tanggal_akhir;
            if ($event->save()) {
                return $this->redirect(['view', 'id' => $model->id_gelombang]);
            } else {
                print_r($event->errors);
            }
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblGelombang model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $model = $this->findModel($id);
        $judul = $model->judul;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->tanggal_akhir > date('Y-m-d')) {
                $old = TblGelombang::find()->where(['status' => 'ongoing'])->one();
                if (!empty($old) && $model->id_gelombang != $old->id_gelombang) {
                    return $this->render('error');
                }
                $model->status = "ongoing";
                $model->save();
            }
            $event = Event::find()->where(['judul' => $judul])->one();
            if (empty($event)) {
                $eventt = new Event();
                $eventt->judul = $model->judul;
                $eventt->tanggal_awal = $model->tanggal_awal;
                $eventt->tanggal_akhir = $model->tanggal_akhir;
                $eventt->save();
                return $this->redirect(['view', 'id' => $model->id_gelombang]);
            }
            $event->judul = $model->judul;
            $event->tanggal_awal = $model->tanggal_awal;
            $event->tanggal_akhir = $model->tanggal_akhir;
            $event->save();
            return $this->redirect(['view', 'id' => $model->id_gelombang]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblGelombang model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        if (!Yii::$app->user->can('akademik')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblGelombang model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblGelombang the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblGelombang::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
