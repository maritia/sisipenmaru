<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TblPembayaran */

$this->title = 'Verifikasi Biaya Pendaftaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-pembayaran-create">

    <p class="h2">Verifikasi Biaya Pendaftaran</p><hr>
    <p class="h5">Pembayaran dilakukan dengan mentransfer biaya pendaftaran langsung melalui bank ke nomor berikut:</p>
    <center class="h4"><b>
            Bank Mandiri Cab. Balige<br>
            An: AKFAR Arjuna<br>
            No Rek: 998092938<br>
        </b></center>
    <p class="h5">Pendaftar harus melampirkan nama dan nomor(kode) formulir di berita pengiriman pada 
        saat melakukan transfer.<br>

        Kode formulir dapat diperoleh dari halaman formulir pendaftaran, 
        setelah melakukan pengisian formulir pendaftaran.</p>
    <p><img src="../../buktipembayaran/npd.PNG" width="600"/></p>

    Dibawah ini merupakan contoh pengisian slip transfer bank yang benar.
    <p><img src="../../buktipembayaran/pembayaran.PNG" width="600"/></p>
    Setiap pendaftar harus meng-upload hasil scan bukti transfer.

    Upload hasil scan slip transfer biaya pendaftaran dalam bentuk gambar, dengan format .jpg atau .png
</p>
<?=
$this->render('_form', [
    'model' => $model,
])
?>

</div>
