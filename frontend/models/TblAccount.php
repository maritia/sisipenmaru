<?php

namespace frontend\models;

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
class TblAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
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
    public function attributeLabels()
    {
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
    public function getTblCamas()
    {
        return $this->hasMany(TblCama::className(), ['id_account' => 'id_account']);
    }
}
