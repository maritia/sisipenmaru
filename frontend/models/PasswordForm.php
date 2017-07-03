<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use kartik\password\StrengthValidator;

class PasswordForm extends Model {

    public $oldpass;
    public $newpass;
    public $repeatnewpass;

    public function rules() {
        return [
            [['oldpass', 'newpass', 'repeatnewpass'], 'required'],
            [['oldpass'], 'findPasswords'],
            ['repeatnewpass', 'compare', 'compareAttribute' => 'newpass'],
         //   [['newpass'], StrengthValidator::className(), 'preset' => 'normal']
        ];
    }

    public function findPasswords($attribute, $params) {
        $user = \frontend\models\TblAccount::find()->where([
                    'id_account' => Yii::$app->user->id
                ])->one();

        $password = $user->password;

        if (!Yii::$app->security->validatePassword($this->oldpass, $password))
            $this->addError($attribute, 'Old password is incorrect');
    }

    public function attributeLabels() {
        return [
            'oldpass' => 'Old Password',
            'newpass' => 'New Password',
            'repeatnewpass' => 'Repeat New Password',
        ];
    }

}

?>