<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tbl_gelombang".
 *
 * @property integer $id_gelombang
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 * @property string $judul
 *
 * @property TblCama[] $tblCamas
 */
class TblGelombang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_gelombang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_awal', 'tanggal_akhir', 'judul'], 'required'],
            [['tanggal_awal', 'tanggal_akhir'], 'safe'],
            [['judul'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gelombang' => 'Id Gelombang',
            'tanggal_awal' => 'Tanggal Awal',
            'tanggal_akhir' => 'Tanggal Akhir',
            'judul' => 'Judul',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCamas()
    {
        return $this->hasMany(TblCama::className(), ['id_gelombang' => 'id_gelombang']);
    }
}
