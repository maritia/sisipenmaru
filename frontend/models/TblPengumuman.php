<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_pengumuman".
 *
 * @property integer $id_pengumuman
 * @property string $judul
 * @property string $deskripsi
 * @property string $status
 * 
 */
class TblPengumuman extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_pengumuman';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['judul', 'tgl_berakhir'], 'required'],
            [['judul'], 'string', 'max' => 100],
            [['deskripsi'], 'string', 'max' => 5000],
            [['status'], 'integer'],
            [['tgl_berakhir'], 'validateTgl'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_pengumuman' => 'Id Pengumuman',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'tgl_berakhir' => 'Tanggal Berakhir',
            'status' => 'Status',
        ];
    }

    public function validateTgl() {
        $olddate = $this->tgl_berakhir;
        $date = date("Y-m-d");
        if ($olddate < $date) {
            Yii::$app->getSession()->setFlash('error', 'Tanggal akhir tidak boleh sebelum tanggal hari ini.');
            $this->addError('tgl_berakhir', "Tanggal akhir tidak boleh sebelum tanggal hari ini.");
        }
    }

}
