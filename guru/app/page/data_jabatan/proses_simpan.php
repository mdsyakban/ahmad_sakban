<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_jabatan'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_jabatan = id_otomatis("data_jabatan", "id_jabatan", "10");
              $jabatan=xss($_POST['jabatan']);


$query = mysql_query("insert into data_jabatan values (
'$id_jabatan'
 ,'$jabatan'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
