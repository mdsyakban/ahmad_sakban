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


$id_guru = id_otomatis("data_guru", "id_guru", "10");
              $nis=xss($_POST['nis']);
              $nama=xss($_POST['nama']);
              $alamat=xss($_POST['alamat']);
              $jenis_kelamin=xss($_POST['jenis_kelamin']);
              $id_jabatan=xss($_POST['id_jabatan']);
              $id_tahun_kerja=xss($_POST['id_tahun_kerja']);
              $id_status_guru=xss($_POST['id_status_guru']);
              $username=xss($_POST['username']);
              $password=md5($_POST['password']);

$query = mysql_query("insert into data_guru values (
'$id_guru'
 ,'$nis'
 ,'$nama'
 ,'$alamat'
 ,'$jenis_kelamin'
 ,'$id_jabatan'
 ,'$id_status_guru'
 ,'$id_tahun_kerja'
 ,'$username'
 ,'$password'


)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
