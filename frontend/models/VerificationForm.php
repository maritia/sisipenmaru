<?php

namespace frontend\models;

use common\models\User;
use yii\base\InvalidParamException;
use yii\base\Model;
use Yii;

/**
 * Password reset form
 */
class VerificationForm extends Model {

    public $verification_code;

    /**
     * @var \common\models\User
     */

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['verification_code', 'required'],
            ['verification_code', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return boolean if password was reset.
     */
    public function verifiyCode($user) {
        if ($user->verification_code == $this->verification_code) {
            $user->verify_status = 'verified';
            $user->save();
            return $this->verification_code;
        } else {
            return false;
        }
    }

}
