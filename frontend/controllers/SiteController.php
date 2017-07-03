<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\RegistrationForm;
use frontend\models\PasswordForm;
use yii\helpers\Url;
use frontend\models\VerificationForm;
use common\models\TblAccount;
use frontend\models\TblCama;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'changepassword'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actionChangepassword() {
        $model = new PasswordForm;
        $modeluser = \common\models\TblAccount::find()->where([
                    'id_account' => Yii::$app->user->id
                ])->one();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                try {
                    $modeluser->password = Yii::$app->getSecurity()->generatePasswordHash($_POST['PasswordForm']['newpass']);
                    if ($modeluser->save()) {
                        Yii::$app->getSession()->setFlash(
                                'success', 'Password changed'
                        );
                        return $this->redirect(['index1']);
                    } else {
                        Yii::$app->getSession()->setFlash(
                                'error', 'Password not changed'
                        );
                        return $this->redirect(['index1']);
                    }
                } catch (Exception $e) {
                    Yii::$app->getSession()->setFlash(
                            'error', "{$e->getMessage()}"
                    );
                    return $this->render('changepassword', [
                                'model' => $model
                    ]);
                }
            } else {
                return $this->render('changepassword', [
                            'model' => $model
                ]);
            }
        } else {
            return $this->render('changepassword', [
                        'model' => $model
            ]);
        }
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['tbl-pembayaran/check']);
        }
        return $this->render('index');
    }

    public function actionIndex1() {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionLogin2($id) {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $acount = \frontend\models\TblAccount::find()->where(['id_account' => $id])->one();
        $acount->verify_status = "verified";
        $acount->save();
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    public function actionRegister() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }$model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if ($model->sendEmail()) {
                    Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                    return $this->redirect(['site/verify', 'user' => $user->id_account]);
                } else {
                    Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
                }
            }
        }
        return $this->render('register1', [
                    'model' => $model,
        ]);
    }

    public function actionVerify($user) {
        $user = TblAccount::find()->where(['id_account' => $user])->one();
        $model = new VerificationForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->verifiyCode($user)) {
                return $this->redirect(['site/login']);
            } else {
                Yii::$app->session->setFlash('error', 'Kode Verifikasi yang anda masukkan salah');
                return $this->redirect(['site/verify', 'user' => $user->id_account]);
            }
        }
        return $this->render('verification', [
                    'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        if (!Yii::$app->user->can('staff')) {
            throw new \yii\web\ForbiddenHttpException;
        }
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
