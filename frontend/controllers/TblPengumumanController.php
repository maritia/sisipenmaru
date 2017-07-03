<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TblPengumuman;
use frontend\models\TblPengumumanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblPengumumanController implements the CRUD actions for TblPengumuman model.
 */
class TblPengumumanController extends Controller {

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
     * Lists all TblPengumuman models.
     * @return mixed
     */
    public function actionCheck() {
        $data = TblPengumuman::find()->all();
        foreach ($data as $chech) {
            $tgl = date('Y-m-d');
            if (($chech->tgl_berakhir < $tgl)) {
                $chech->delete();
            } 
        }
        return $this->redirect(['site/index1']);
    }

    public function actionCheck1() {
        $data = TblPengumuman::find()->all();
        foreach ($data as $chech) {
            $tgl = date('Y-m-d');
            if (($chech->tgl_berakhir < $tgl)) {
                $chech->delete();
            } 
        }
        return $this->redirect(['index']);
    }

    public function actionIndex() {
        $searchModel = new TblPengumumanSearch();
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => TblPengumuman::find()->where(['status' => '1'])
        ]);
        if (Yii::$app->user->can('akademik')) {
            $model = new TblPengumuman();
            $model->status = 1;

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
            return $this->render('index', [
                        'model' => $model,
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('index_1', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single TblPengumuman model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblPengumuman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TblPengumuman();
        $model->status = 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $date = date("Y-m-d");
            if ($model->berakhir == $date){
                $model->status = 1;
                $model->save();
            }
                return $this->redirect(['check1']);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TblPengumuman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pengumuman]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblPengumuman model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPengumuman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblPengumuman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblPengumuman::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
