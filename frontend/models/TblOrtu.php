<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_ortu".
 *
 * @property integer $id_ortu
 * @property integer $id_cama
 * @property string $nm_ayah
 * @property string $nm_ibu
 * @property string $alamat
 * @property string $kd_pos
 * @property string $pk_ayah
 * @property string $pk_ibu
 * @property integer $gaji_ayah
 * @property integer $gaji_ibu
 *
 * @property TblCama $idCama
 */
class TblOrtu extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_ortu';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id_cama', 'nm_ayah', 'nm_ibu', 'alamat', 'kd_pos', 'pk_ayah', 'pk_ibu', 'gaji_ayah', 'gaji_ibu'], 'required'],
            [['id_cama', 'gaji_ayah', 'gaji_ibu'], 'integer'],
            [['nm_ayah', 'nm_ibu'], 'string', 'max' => 64],
            [['alamat'], 'string', 'max' => 500],
            [['kd_pos'], 'string', 'max' => 5],
            [['pk_ayah', 'pk_ibu'], 'string', 'max' => 64],
            [['kd_pos'], 'string', 'max' => 5, 'min' => 5, 'message' => 'Kode Pos Hanya boleh terdiri dari 5 Digit.'],
            [['gaji_ayah', 'gaji_ibu'], 'match', 'pattern' => '/^[0-9 .\-]+$/i', 'message' => 'Gaji can only contain number.'],
            ['nm_ayah', 'match', 'pattern' => '/^[a-z .\-]+$/i', 'message' => 'Nama ayah hanya boleh terdiridari huruf.'],
            ['nm_ibu', 'match', 'pattern' => '/^[a-z .\-]+$/i', 'message' => 'Nama ibu hanya boleh terdiridari huruf.'],
            [['pk_ayah', 'pk_ibu'], 'match', 'pattern' => '/^[a-z .\-]+$/i', 'message' => 'Nama ayah hanya boleh terdiridari huruf.'],
            [['id_cama'], 'exist', 'skipOnError' => true, 'targetClass' => TblCama::className(), 'targetAttribute' => ['id_cama' => 'id_cama']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_ortu' => 'Id Ortu',
            'id_cama' => 'Id Cama',
            'nm_ayah' => 'Nama Ayah',
            'nm_ibu' => 'Nama Ibu',
            'alamat' => 'Alamat',
            'kd_pos' => 'Kode Pos',
            'pk_ayah' => 'Pekerjaan Ayah',
            'pk_ibu' => 'Pekerjaan Ibu',
            'gaji_ayah' => 'Gaji Ayah',
            'gaji_ibu' => 'Gaji Ibu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCama() {
        return $this->hasOne(TblCama::className(), ['id_cama' => 'id_cama']);
    }

}
