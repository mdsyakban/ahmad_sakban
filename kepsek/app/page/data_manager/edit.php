
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KE HALAMAN SEBELUMNYA'); ?>
</a>

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Edit Data manager </strong>
        <hr class="message-inner-separator">
            <p>Silahkan Update Data manager  dibawah ini.</p>
        </div>
    </div>


<div class="content-box">
    <form action="proses_update.php"  enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
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
                    $sql = mysql_query("SELECT * FROM data_manager where id_manager = '$proses'");
                    $data = mysql_fetch_array($sql);
                    ?>
                    <!--h
                    <tr>
                        <td width="25%" class="leftrowcms">					
                            <label >Id manager  <font color="red">*</font></label>
                        </td>
                        <td width="2%">:</td>
                        <td>
                           <?php echo $data['id_manager']; ?>	
                        </td>
                    </tr>
                    h-->
                    <input type="hidden" class="form-control" name="id_manager" value="<?php echo $data['id_manager']; ?>" readonly  id="id_manager" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nip  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="nip" id="nip" placeholder="Nip " required="required" value="<?php echo ($data['nip']); ?>">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Nama  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="nama" id="nama" placeholder="Nama " required="required" value="<?php echo ($data['nama']); ?>">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Alamat  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <textarea class="form-control" style="width:50%" type="text" name="alamat" id="alamat" placeholder="Alamat " required="required"><?php echo ($data['alamat']); ?></textarea>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >No Telepon  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="no_telepon" id="no_telepon" placeholder="No Telepon " required="required" value="<?php echo ($data['no_telepon']); ?>">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jenis Kelamin  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin " required="required">
                                <option value="<?php echo ($data['jenis_kelamin']); ?>">- <?php echo ($data['jenis_kelamin']); ?> -</option><?php combo_enum('data_manager','jenis_kelamin',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Username  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="username" id="username" placeholder="Username " required="required" value="<?php echo ($data['username']); ?>">
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Password  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="password" name="password" id="password" placeholder="Password " required="required" >
                            </td>
                        </tr>


                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_update(' PROSES UPDATE DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>
