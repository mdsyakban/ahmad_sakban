<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_guru'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_guru = xss($_POST['id_guru']);
$nis = xss($_POST['nis']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$jenis_kelamin = xss($_POST['jenis_kelamin']);
$id_jabatan = xss($_POST['id_jabatan']);
$id_tahun_kerja = xss($_POST['id_tahun_kerja']);
$id_status_guru = xss($_POST['id_status_guru']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);


$query = mysql_query("update data_guru set 
nis='$nis',
nama='$nama',
alamat='$alamat',
jenis_kelamin='$jenis_kelamin',
id_jabatan='$id_jabatan',
id_tahun_kerja='$id_tahun_kerja',
id_status_guru='$id_status_guru',
username='$username',
password='$password'

where id_guru='$id_guru' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
