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


$id_status_guru = id_otomatis("data_status_guru", "id_status_guru", "10");
              $status_guru=xss($_POST['status_guru']);


$query = mysql_query("insert into data_status_guru values (
'$id_status_guru'
 ,'$status_guru'

)");

if ($query) {
    ?>
    <script>location.href = "<?php index(); ?>?input=popup_tambah";</script>
    <?php
} else {
    echo "GAGAL DIPROSES";
}
?>
