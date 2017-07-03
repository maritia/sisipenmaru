<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_pembayaran".
 *
 * @property integer $id_pembayaran
 * @property integer $id_cama
 * @property string $status
 * @property string $foto
 *
 * @property TblCama $idCama
 */
class TblPembayaran extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName() {
        return 'tbl_pembayaran';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_cama', 'status'], 'required'],
            [['id_cama'], 'integer'],
            [['status', 'foto'], 'string', 'max' => 100],
            [['foto'], 'file', 'extensions' => ['jpg', 'png',]],
            [['id_cama'], 'exist', 'skipOnError' => true, 'targetClass' => TblCama::className(), 'targetAttribute' => ['id_cama' => 'id_cama']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_pembayaran' => 'Id Pembayaran',
            'id_cama' => 'Id Cama',
            'status' => 'Status',
            'foto' => '',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCama() {
        return $this->hasOne(TblCama::className(), ['id_cama' => 'id_cama']);
    }

}
