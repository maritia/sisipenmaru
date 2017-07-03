<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "notification".
 *
 * @property integer $id_notif
 * @property integer $id_cama
 * @property string $keterangan
 *
 * @property TblCama $idCama
 */
class Notification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cama', 'keterangan'], 'required'],
            [['id_cama'], 'integer'],
            [['keterangan'], 'string', 'max' => 255],
            [['id_cama'], 'exist', 'skipOnError' => true, 'targetClass' => TblCama::className(), 'targetAttribute' => ['id_cama' => 'id_cama']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_notif' => 'Id Notif',
            'id_cama' => 'Id Cama',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCama()
    {
        return $this->hasOne(TblCama::className(), ['id_cama' => 'id_cama']);
    }
}
