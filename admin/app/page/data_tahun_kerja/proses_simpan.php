<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_tahun_kerja'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}


$id_tahun_kerja = id_otomatis("data_tahun_kerja", "id_tahun_kerja", "10");
              $tahun_kerja=xss($_POST['tahun_kerja']);


$query = mysql_query("insert into data_tahun_kerja values (
'$id_tahun_kerja'
 ,'$tahun_kerja'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
