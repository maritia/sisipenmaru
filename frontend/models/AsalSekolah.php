<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "asal_sekolah".
 *
 * @property integer $id
 * @property string $nama_sekolah
 * @property string $alamat
 *
 * @property TblCama[] $tblCamas
 */
class AsalSekolah extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'asal_sekolah';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['nama_sekolah', 'alamat'], 'required'],
            [['nama_sekolah'], 'string', 'max' => 64],
            [['alamat'], 'string', 'max' => 150],
            [['nama_sekolah'], 'validateAsalsekolah']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nama_sekolah' => 'Nama Sekolah',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCamas() {
        return $this->hasMany(TblCama::className(), ['id_sekolah' => 'id']);
    }

    public function validateAsalsekolah() {
        $asalsekolah = $this->nama_sekolah;
        $usnm = AsalSekolah::find()->where(['nama_sekolah' => $asalsekolah])->one();
        if (!empty($usnm))
            $this->addError('nama_sekolah', 'Sekolah yang anda daftarkan sudah ada');
    }

}
