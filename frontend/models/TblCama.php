<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_cama".
 *
 * @property integer $id_cama
 * @property integer $id_sekolah
 * @property integer $id_account
 * @property string $tmp_lahir
 * @property string $tgl_lahir
 * @property integer $bln_lahir
 * @property string $thn_tamat
 * @property string $agama
 * @property string $kd_pos
 * @property string $no_hp
 * @property string $foto
 * @property string $nama
 * @property integer $id_gelombang
 * @property string $alamat
 * @property string $kelulusan
 * @property string $no_pendaftaran
 * @property string $tgl_daftar
 * @property integer $thn_lahir
 * @property string $jk
 *
 * @property Notification[] $notifications
 * @property TblAccount $idAccount
 * @property AsalSekolah $idSekolah
 * @property TblGelombang $idGelombang
 * @property TblOrtu[] $tblOrtus
 * @property TblPembayaran[] $tblPembayarans
 */
class TblCama extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_cama';
    }

    public $file;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
//            [['thn_lahir'], 'validateTgllahir'],
//            [['thn_tamat'], 'validateTahuntamat'],
            [['id_sekolah', 'tmp_lahir', 'tgl_lahir', 'bln_lahir', 'thn_tamat', 'agama', 'kd_pos', 'no_hp', 'nama', 'alamat', 'kelulusan', 'no_pendaftaran', 'tgl_daftar', 'thn_lahir', 'jk'], 'required'],
            [['id_sekolah', 'id_account', 'bln_lahir', 'id_gelombang', 'thn_lahir'], 'integer'],
            [['thn_tamat', 'tgl_daftar'], 'safe'],
            [['tmp_lahir'], 'string', 'max' => 100],
            [['tgl_lahir'], 'string', 'max' => 2],
            [['agama'], 'string', 'max' => 20],
            [['kd_pos'], 'string', 'max' => 5, 'min' => 5, 'message' => 'Kode Pos Hanya boleh terdiri dari 5 Digit.'],
            [['no_hp'], 'string', 'max' => 16, 'min' => 10,],
            [['nama'], 'string', 'max' => 64],
            [['alamat'], 'string', 'max' => 500],
            [['kelulusan'], 'string', 'max' => 34],
            [['no_pendaftaran'], 'string', 'max' => 14],
            [['jk'], 'string', 'max' => 10],
            ['nama', 'match', 'pattern' => '/^[a-z .\-]+$/i', 'message' => 'Nama hanya boleh terdiri dari huruf.'],
            ['thn_tamat', 'match', 'pattern' => '/^[0-9 .\-]+$/i', 'message' => 'Tahun tamat hanya boleh terdiri dari angka.'],
            ['no_hp', 'match', 'pattern' => '/^[0-9 .\-]+$/i', 'message' => 'Nomor HP hanya boleh terdiri dari angka.'],
            [['foto'], 'file', 'extensions' => ['png', 'jpg', 'gif'], 'maxSize' => 1024 * 1024],
            ['foto', 'image',
                'minWidth' => 350, 'maxWidth' => 360,
                'minHeight' => 470, 'maxHeight' => 480,
                'message' => 'Nama hanya boleh terdiri dari huruf.',
            ],
//            [['id_account'], 'exist', 'skipOnError' => true, 'targetClass' => TblAccount::className(), 'targetAttribute' => ['id_account' => 'id_account']],
//            [['id_sekolah'], 'exist', 'skipOnError' => true, 'targetClass' => AsalSekolah::className(), 'targetAttribute' => ['id_sekolah' => 'id']],
//            [['id_gelombang'], 'exist', 'skipOnError' => true, 'targetClass' => TblGelombang::className(), 'targetAttribute' => ['id_gelombang' => 'id_gelombang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id_cama' => 'Id Cama',
            'id_sekolah' => 'Asal Sekolah',
            'id_account' => 'Id Account',
            'tmp_lahir' => 'Tempat Lahir',
            'tgl_lahir' => 'Tanggal Lahir',
            'bln_lahir' => 'Bulan Lahir',
            'thn_tamat' => 'Tahun Tamat',
            'agama' => 'Agama',
            'kd_pos' => 'Kode Pos',
            'no_hp' => 'Nomor Hp',
            'foto' => 'Foto',
            'nama' => 'Nama',
            'id_gelombang' => 'Id Gelombang',
            'alamat' => 'Alamat',
            'kelulusan' => 'Kelulusan',
            'no_pendaftaran' => 'Nomor Pendaftaran',
            'tgl_daftar' => 'Tanggal Daftar',
            'thn_lahir' => 'Tahun Lahir',
            'jk' => 'Jenis Kelamin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function validateTgllahir() {
        $cama = $this->thn_lahir;
        $dat = date("Y", strtotime("-16 year"));
        $datee = date("Y", strtotime("-40 year"));
        if ($dat < $cama || $datee > $cama) {
            $this->addError('thn_lahir', "Umur minimal 16 Tahun dan Maksimal 40 Tahun.");
        }
    }

    public function validateTahuntamat() {
        $cama = $this->thn_tamat;
        $date = date("Y", strtotime("-20 year"));
        if ($date > $cama) {
            $this->addError('thn_tamat', "Maksimal 20 Tahun tamat.");
        }
    }

    public function getNotifications() {
        return $this->hasMany(Notification::className(), ['id_cama' => 'id_cama']);
    }

    public function getYearsList() {
        $currentYear = date('Y');
        $date = date("Y", strtotime("-40 year"));
        $yearFrom = $date;
        //die($yearFrom);

        $yearsRange = range($yearFrom, $currentYear);
        return array_combine($yearsRange, $yearsRange);
    }

    public function getYearsList1() {
        $currentYear = date('Y');
        $date = date("Y", strtotime("-20 year"));
        $yearFrom = $date;
        //die($yearFrom);

        $yearsRange = range($yearFrom, $currentYear);
        return array_combine($yearsRange, $yearsRange);
    }

    public function getDaysList() {
        $yearsRange = range(1, 31);
        return array_combine($yearsRange, $yearsRange);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAccount() {
        return $this->hasOne(TblAccount::className(), ['id_account' => 'id_account']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSekolah() {
        return $this->hasOne(AsalSekolah::className(), ['id' => 'id_sekolah']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGelombang() {
        return $this->hasOne(TblGelombang::className(), ['id_gelombang' => 'id_gelombang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblOrtus() {
        return $this->hasMany(TblOrtu::className(), ['id_cama' => 'id_cama']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPembayarans() {
        return $this->hasMany(TblPembayaran::className(), ['id_cama' => 'id_cama']);
    }

}
