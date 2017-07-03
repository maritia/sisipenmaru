<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $judul
 * @property string $deskripsi
 * @property string $tanggal_awal
 * @property string $tanggal_akhir
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal_awal', 'tanggal_akhir'], 'required'],
            [['tanggal_awal', 'tanggal_akhir'], 'safe'],
            [['judul'], 'string', 'max' => 255],
            [['deskripsi'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'deskripsi' => 'Deskripsi',
            'tanggal_awal' => 'Tanggal Awal',
            'tanggal_akhir' => 'Tanggal Akhir',
        ];
    }
}
