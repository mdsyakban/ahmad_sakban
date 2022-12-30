
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>

<br><br>

<div class="content-box">
    <div class="content-box-content">
        <table <?php tabel_in(100, '%', 0, 'center'); ?>>		
            <tbody>
               
                <?php
                if (!isset($_GET['proses'])) {
                        
                    ?>
                <script>
                    alert("AKSES DITOLAK");
                    location.href = "index.php";
                </script>
                <?php
                die();
            }
            $proses = decrypt(mysql_real_escape_string($_GET['proses']));
            $sql = mysql_query("SELECT * FROM data_status_guru where id_status_guru = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
            <tr>
                <td class="clleft" width="25%">Id status_guru </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_status_guru']; ?></td>	
            </tr>

            <tr>
                <td class="clleft" width="25%">status_guru </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['status_guru']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>
