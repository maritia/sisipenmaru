<?php

namespace frontend\controllers;

use Yii;
use common\models\TblAccount;
use frontend\models\TblAccountSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\TblCama;

/**
 * TblAccountController implements the CRUD actions for TblAccount model.
 */
class TblAccountController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblAccount models.
     * @return mixed
     */
    public function actionUpload($id) {
        $model = \frontend\models\TblCama::find()->where(['id_cama' => $id])->one();
        $foto = \yii\web\UploadedFile::getInstance($model, 'foto');
        $foto->saveAs('../../fotoprofil/' . \Yii::$app->user->id . '.' . $foto->extension);

        return $this->render('view', [
                    'model' => $this->findModel($model->id_account),
        ]);
    }

    public function actionIndex() {
        $searchModel = new TblAccountSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblAccount model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = TblCama::find()->where(['id_account' => $id])->one();

        if (Yii::$app->user->can('student')) {
            return $this->render('view', [
                        // 'model' => $this->findModel($id),
                        'model' => $model,
            ]);
        } else {
            return $this->render('view_1', [
                        // 'model' => $this->findModel($id),
                        'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new TblAccount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new TblAccount();
        $emaill = 'ce314014@students.del.ac.id';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->mailer->compose()
                    ->setFrom([\Yii::$app->params['supportEmail'] => 'Sistem Informasi SPI'])
                    ->setTo($emaill)
                    ->setSubject('Verification Code')
                    ->setHtmlBody('<p>Hello</p>')
                    ->send();
            return $this->redirect(['view', 'id' => $model->id_account]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    public function Sendmail($message, $tujuan, $subjek) {
        $email = Yii::$app->mailer->compose()
                ->setFrom([\Yii::$app->params['supportEmail'] => 'Sistem Informasi SPI'])
                ->setTo($tujuan)
                ->setSubject($subjek)
                ->setHtmlBody($message)
                ->send();
        return $email;
    }

    /**
     * Updates an existing TblAccount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_account]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TblAccount model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblAccount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblAccount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = TblAccount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
