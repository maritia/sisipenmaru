<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_account".
 *
 * @property integer $id_account
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $verification_code
 * @property string $verify_status
 *
 * @property TblCama[] $tblCamas
 */
class TblAccount extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_account';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password', 'email', 'verification_code'], 'required'],
            [['username', 'password'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 200],
            [['verification_code'], 'string', 'max' => 64],
            [['verify_status'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_account' => 'Id Account',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'verification_code' => 'Verification Code',
            'verify_status' => 'Verify Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCamas() {
        return $this->hasMany(TblCama::className(), ['id_account' => 'id_account']);
    }

    public function validateCurrentPassword() {
        if (!$this->verifyPassword($this->currentPassword)) {
            $this->addError("currentPassword", "current password incorrect");
        }
    }

    public function verifyPassword($password) {
        $dbpassword = static::findOne(['username' => Yii::$app->user->identity->username])->password;
        return Yii::$app->security->validatePassword($password, $dbpassword);
    }

    /**
     * @inheritdoc
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCama() {
        return $this->hasMany(TblCama::className(), ['id_account' => 'id_account']);
    }

    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token,
                    'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        //return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    public static function findIdentity($id) {
        return static::findOne(['id_account' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

}
