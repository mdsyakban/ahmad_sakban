
<body>

  <!-- if ($_COOKIE['hak_akses'] == "admin") {  -->
    <a href="<?php index(); ?>?input=tambah">
        <?php btn_tambah('Tambah Data'); ?>
    </a>
    <!-- }  -->

    <a target="blank" href="cetak.php?berdasarkan=data_guru&jenis=xls&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_export('Export Excel'); ?>
    </a>

    <a target="blank" href="cetak.php?berdasarkan=data_guru&jenis=print&pakaiperperiode=<?php echo $status_pakaiperperiode; ?>">
        <?php btn_cetak('Cetak'); ?>
    </a>

    <a href="<?php index(); ?>">
        <?php btn_refresh('Refresh Data'); ?>
    </a>

    <br><br>

    <form name="formcari" id="formcari" action="" method="get">
        <fieldset> 
            <table>
                <tbody>
                    <tr>
                        <td>Berdasarkan</td>	
                        <td>:</td>	
                        <td>
                            <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> 
                            <select class="form-control selectpicker" data-live-search="true" name="Berdasarkan" id="Berdasarkan">
                                <?php
                                $sql = "desc data_guru";
                                $result = @mysql_query($sql);
                                while ($row = @mysql_fetch_array($result)) {
                                    echo "<option name='berdasarkan' value=$row[0]>$row[0]</option>";
                                }
                                ?>
                            </select>							
                        </td>
                    </tr>

                    <tr>
                        <td>Pencarian</td>	
                        <td>:</td>	
                        <td>							
                                <!--<input class="form-control" type="text" name="isi" value="" >--> <input  type="text" name="isi" value="" >
                            <?php btn_cari('Cari'); ?>
                        </td>
                    </tr>
                </tbody>
            </table>									
        </fieldset>
    </form>

    <div style="overflow-x:auto;">
        <table <?php tabel(100, '%', 1, 'left'); ?> >
            <tr>					
            <?php  if ($_COOKIE['hak_akses'] == "admin") { ?>			  
                <th>Action</th>
                <?php } ?>
                <th>Action</th>
                <th>No</th>
                <!--h <th>Id guru </th> h-->
                <th align="center" class="th_border cell"  >Nip </th>
                <th align="center" class="th_border cell"  >Nama </th>
                <th align="center" class="th_border cell"  >Alamat </th>
                <th align="center" class="th_border cell"  >Jenis Kelamin </th>
                <th align="center" class="th_border cell"  >jabatan </th>
                <th align="center" class="th_border cell"  >status_guru</th>
                <th align="center" class="th_border cell"  >tahun kerja </th>
                <th align="center" class="th_border cell"  >Username</th>
                <th align="center" class="th_border cell"  >Password </th>
            
            </tr>

            <tbody>
                <?php
                $no = 0;
                $startRow = ($page - 1) * $dataPerPage;
                $no = $startRow;

                if (isset($_GET['Berdasarkan']) && !empty($_GET['Berdasarkan']) && isset($_GET['isi']) && !empty($_GET['isi'])) {
                    $berdasarkan = mysql_real_escape_string($_GET['Berdasarkan']);
                    $isi = mysql_real_escape_string($_GET['isi']);
                    $querytabel = "SELECT * FROM data_guru where $berdasarkan like '%$isi%'  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_guru where $berdasarkan like '%$isi%'";
                } else {
                    $querytabel = "SELECT * FROM data_guru  LIMIT $startRow ,$dataPerPage";
                    $querypagination = "SELECT COUNT(*) AS total FROM data_guru";
                }
                $proses = mysql_query($querytabel);
                while ($data = mysql_fetch_array($proses)) {
                    ?>
                    <tr class="event2">	
                    <!-- if ($_COOKIE['hak_akses'] == "admin") {  -->
                        <td class="th_border cell" align="center" width="200">
                            <table border="0">
                                <tr>
                                    <td>
                                        <form target="blank" action="../../../../" method="post">
                                            <input name="nama" value="<?php echo $data['nis']; ?>-<?php echo strtoupper($data['nama']); ?>" type="hidden">
                                            <input class="btn btn-info btn-xs" type="submit" value="Buat data Face">
                                        </form>

                                        <?php 

                                        $name =  $data['nis']."-".strtoupper($data['nama']); 
                                        $filename = "../../../../data/".$name;

                                        if (file_exists($filename)) {
                                            echo "<font color='green'>Tersedia.</font>";
                                            
                                        } else {
                                            echo "Belum Tersedia.";
                                        }


                                        ?>

                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=edit&proses=<?= encrypt($data['id_guru']); ?>">
                                        <?php btn_edit('Edit'); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php index(); ?>?input=hapus&proses=<?= encrypt($data['id_guru']); ?>">
                                        <?php btn_hapus('Hapus'); ?>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <!-- } -->
                        <td align="center" width="50"><?php $no = (($no + 1) ); echo $no; ?></td>
                        <!--h <td align="center"><?php echo $data['id_guru']; ?></td> h-->
                        <td align="center"><?php echo $data['nis']; ?></td>
                        <td align="center"><?php echo $data['nama']; ?></td>
                        <td align="center"><?php echo $data['alamat']; ?></td>
                        <td align="center"><?php echo $data['jenis_kelamin']; ?></td>
                        <td align="center"><?php echo baca_database("","jabatan","select * from data_jabatan where id_jabatan='$data[id_jabatan]'")  ?></td>
                        <td align="center"><?php echo baca_database("","status_guru","select * from data_status_guru where id_status_guru='$data[id_status_guru]'")  ?></td>
                        <td align="center"><?php echo baca_database("","tahun_kerja","select * from data_tahun_kerja where id_tahun_kerja='$data[id_tahun_kerja]'")  ?></td>
                        <td align="center"><?php echo $data['username']; ?></td>
                        <td align="center"><?php echo $data['password']; ?></td>
      
                       


                    
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

   <?php Pagination($page, $dataPerPage, $querypagination); ?>

</body>
