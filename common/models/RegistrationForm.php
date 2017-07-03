<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\TblAccount;
use common\models\TblCama;
use common\models\AuthAssignment;
use kartik\password\StrengthValidator;

class RegistrationForm extends Model {

    /**
     * @inheritdoc
     */
    public $username;
    public $password;
    public $captcha;
    public $email;

    public function rules() {

        return [
            //nomor 2
            [['username', 'password', 'email'], 'required'],
            ['password', 'validatePassword'],
            [['username'], 'validateUsername'],
            [['email'], 'validateEmail'],
            ['captcha', 'required'],
            ['captcha', 'captcha'],
            ['email', 'email'],
            ['email', 'filter', 'filter' => 'trim'],
            [['password'], StrengthValidator::className(), 'preset' => 'normal', 'userAttribute' => 'username']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    public function validateUsername() {
        $username = $this->username;
        $usnm = TblAccount::find()->where(['username' => $username])->count();
        if ($usnm != 0)
            $this->addError('username', 'Username  harus unik');
    }

    public function validateEmail() {
        $email = $this->email;
        $usnm = TblAccount::find()->where(['email' => $email])->count();
        if ($usnm != 0) {
            $this->addError('email', 'Email  harus unik');
        }
    }

    public function validatePassword() {
        $pass = $this->password;
        if (strlen($pass) < 8)
            $this->addError('password', 'Password minimal 8 karakter');
    }

    public static function hashPassword($_password) {
        return (Yii::$app->getSecurity()->generatePasswordHash($_password));
    }

    public function register() {
        if ($this->validate()) { //rules harus dijalankan 
            $account = new TblAccount();
            $account->username = $this->username;
            $account->password = self::hashPassword($this->password);
            $account->email = $this->email;
            $account->verification_code = $account->id_account . '5t5t5' . date('Y') . rand(200, 1000);
            if ($account->save()) {
                $asiggment = new AuthAssignment();
                $asiggment->item_name = "student";
                $asiggment->user_id = $account->id_account;
                if ($asiggment->save()) {
                    return $account;
                } else {
                    print_r($asiggment->errors);
                }
            } else {
                print_r($account->errors);
            }
            return false;
        }
    }

    public function sendEmail() {
        $model = TblAccount::find()->where(['email' => $this->email])->one();
        /* @var $user User */
        return \Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['model' => $model])
                        ->setFrom([\Yii::$app->params['supportEmail'] => 'Sitem Informasi ' . \Yii::$app->name])
                        ->setTo($this->email)
                        ->setSubject('Kode verifikasi dari' . \Yii::$app->name)
                        ->send();
    }

}
