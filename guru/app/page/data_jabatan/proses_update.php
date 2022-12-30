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

$id_jabatan = xss($_POST['id_jabatan']);
$jabatan = xss($_POST['jabatan']);


$query = mysql_query("update data_jabatan set 
jabatan='$jabatan'

where id_jabatan='$id_jabatan' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
