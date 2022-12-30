
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
            $sql = mysql_query("SELECT * FROM data_guru where id_guru = '$proses'");
            $data = mysql_fetch_array($sql);
            ?>
            <tr>
                <td class="clleft" width="25%">Id guru </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_guru']; ?></td>	
            </tr>

            <tr>
                <td class="clleft" width="25%">Nip </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['nis']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Nama </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['nama']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Alamat </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['alamat']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Jenis Kelamin </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['jenis_kelamin']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Id jabatan </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_jabatan']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Id tahun kerja </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_tahun_kerja']; ?></td>
            </tr>
            <tr>
                <td class="clleft" width="25%">Id status_guru </td>
                <td class="clleft" width="2%">:</td>
                <td class="clleft"><?php echo $data['id_status_guru']; ?></td>
            </tr>




            </tbody>
        </table>
    </div>
</div>
