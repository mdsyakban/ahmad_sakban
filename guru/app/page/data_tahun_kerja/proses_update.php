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

$id_tahun_kerja = xss($_POST['id_tahun_kerja']);
$tahun_kerja = xss($_POST['tahun_kerja']);


$query = mysql_query("update data_tahun_kerja set 
tahun_kerja='$tahun_kerja'

where id_tahun_kerja='$id_tahun_kerja' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
