
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
            $sql = mysql_query("SELECT * FROM data_tahun_kerja where id_tahun_kerja = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
            <tr>
                <td class="clleft" width="25%">Id tahun kerja </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_tahun_kerja']; ?></td>	
            </tr>

            <tr>
                <td class="clleft" width="25%">tahun kerja </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['tahun_kerja']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>
