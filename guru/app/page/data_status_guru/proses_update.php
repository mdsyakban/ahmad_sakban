<?php
include '../../../include/all_include.php';

if (!isset($_POST['id_status_guru'])) {
        
    ?>
    <script>
        alert("AKSES DITOLAK");
        location.href = "index.php";
    </script>
    <?php
    die();
}

$id_status_guru = xss($_POST['id_status_guru']);
$status_guru = xss($_POST['status_guru']);


$query = mysql_query("update data_status_guru set 
status_guru='$status_guru'

where id_status_guru='$id_status_guru' ") or die(mysql_error());

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_edit";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
