<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_manager'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_manager = xss($_POST['id_manager']);
$nip = xss($_POST['nip']);
$nama = xss($_POST['nama']);
$alamat = xss($_POST['alamat']);
$no_telepon = xss($_POST['no_telepon']);
$jenis_kelamin = xss($_POST['jenis_kelamin']);
$username = xss($_POST['username']);
$password = md5($_POST['password']);


$query = mysql_query("update data_manager set 
nip='$nip',
nama='$nama',
alamat='$alamat',
no_telepon='$no_telepon',
jenis_kelamin='$jenis_kelamin',
username='$username',
password='$password'

where id_manager='$id_manager' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
