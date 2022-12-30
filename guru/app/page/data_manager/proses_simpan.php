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


$id_manager = id_otomatis("data_manager", "id_manager", "10");
              $nip=xss($_POST['nip']);
              $nama=xss($_POST['nama']);
              $alamat=xss($_POST['alamat']);
              $no_telepon=xss($_POST['no_telepon']);
              $jenis_kelamin=xss($_POST['jenis_kelamin']);
              $username=xss($_POST['username']);
              $password=md5($_POST['password']);


$query = mysql_query("insert into data_manager values (
'$id_manager'
 ,'$nip'
 ,'$nama'
 ,'$alamat'
 ,'$no_telepon'
 ,'$jenis_kelamin'
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
