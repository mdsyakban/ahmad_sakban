
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI KEHALAMAN SEBELUMNYA'); ?>
</a>	

    <div class="col-sm-12" style="margin-bottom: 20px; margin-top: 20px;">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <strong>Tambah Data Jadwal </strong>
        <hr class="message-inner-separator">
            <p>Silahkan input Data Jadwal  dibawah ini.</p>
        </div>
    </div>

<div class="content-box">
    <form action="proses_simpan.php" enctype="multipart/form-data"  method="post">
        <div class="content-box-content">
            <div id="postcustom">	
                <table <?php tabel_in(100, '%', 0, 'center'); ?>>		
                    <tbody>
                        <!--h
                        <tr>
                            <td width="25%" class="leftrowcms">					
                                <label >Id Jadwal  <span class="highlight">*</span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                              <?php echo id_otomatis("data_jadwal", "id_jadwal", "10"); ?>  		
                            </td>
                        </tr>
                        h-->
                        <input type="hidden" class="form-control" readonly value="<?php echo id_otomatis("data_jadwal", "id_jadwal", "10"); ?>" name="id_jadwal" placeholder="Id Jadwal " id="id_jadwal" required="required">

                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Hari  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <select class="form-control" style="width:50%" type="text" name="hari" id="hari" placeholder="Hari " required="required">
                                <option></option><?php combo_enum('data_jadwal','hari',''); ?>
                                </select>
                            </td>
                        </tr>
                          <tr>
                            <td width="25%" class="leftrowcms">
                                <label >Jam  <span class="highlight"></span></label>
                            </td>
                            <td width="2%">:</td>
                            <td>
                                <input  class="form-control" style="width:50%" type="varchar" name="jam" id="jam" placeholder="Jam " required="required">
                            </td>
                        </tr>
                          

                        
                
                        
                    </tbody>
                </table>
                <div class="content-box-content">
                    <center>
                        <?php btn_simpan(' PROSES SIMPAN DATA'); ?>
                    </center>
                </div>		
            </div>
        </div>
    </form>
