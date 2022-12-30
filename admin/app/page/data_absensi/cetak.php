<?php
if (isset($_GET['input'])) {
    echo "<h3> Cetak Laporan ";
    tabelnomin();
    echo "</h3>";
    ?>
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">
    <?php
    action_cetak("data_absensi");
} else {

    function location() {
        return "cetak";
    }

    include '../../../include/all_include.php';
    proses_action_cetak("data_absensi");
    ?>
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new.css">
    <link rel="stylesheet" type="text/css" href="../../../data/cssjs/cetak/style_new2.css">


    <!-- HEADER -->
    <table border="0" style="width: 100%">
        <?php
        if (isset($_GET['export'])) {
            
        } else {
            ?>
            <tr>
                <td class="auto-style1" rowspan="3" width="101">
                    <img alt="" height="100" src="<?php echo $logo_laporan1; ?>" width="100"></td>

                <td class="auto-style1">
            <center>
                <h2 class="auto-style1"><?php echo $judul; ?></h2>
            </center>
        </td>

        <td class="auto-style1" rowspan="3" width="101">
            <img alt="" height="100" src="<?php echo $logo_laporan2; ?>" width="100"></td>
        </tr>
    <?php } ?>

    <tr>
        <td class="auto-style2">
    <center>
        <strong>LAPORAN

            <?php
            $tabelnya = "data_absensi";
            $tabelnya = str_replace("_", " ", $tabelnya);
            $tabelnya = str_replace("data", "", $tabelnya);
            $tabelnya = strtoupper($tabelnya);
            echo $tabelnya;
            ?>

        </strong>
    </center>
    </td>
    </tr>

    <tr>
        
        <td class="auto-style2"><?php echo $alamat; ?><br><?php echo $email; ?></td>
        
    </tr>

    </table>
    <!-- HEADER -->

    <!-- BODY -->
    <style type="text/css"></style>
    <?php
ini_set('date.timezone', 'Asia/Jakarta');
$tanggal = date('Y-m');
$tanggal_tersebut = date('Y-F');
$ubah = strtotime($tanggal);
$ubah_tersebut = strtotime($tanggal_tersebut);
$bulan = date('m', $ubah);
$bulan_tersebut = date('F', $ubah_tersebut);
$tahun = date('Y', $ubah);
$tampil = "satu";
if (isset($_GET['bulan']))
{
  
  $bulan = $_GET['bulan'];
  $tahun = $_GET['tahun'];
  $tanggal = $_GET['tahun']."-".$_GET['bulan'];
  $tampil = "semua";
}
$jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

function hariIndo ($hariInggris) {
  switch ($hariInggris) {
    case 'Sunday':
    return 'Minggu';
    case 'Monday':
    return 'Senin';
    case 'Tuesday':
    return 'Selasa';
    case 'Wednesday':
    return 'Rabu';
    case 'Thursday':
    return 'Kamis';
    case 'Friday':
    return 'Jumat';
    case 'Saturday':
    return 'Sabtu';
    default:
    return 'hari tidak valid';
  }
}
?>

<p>

  


  
  <h4>Bulan : <?php echo ($bulan_tersebut) . ' ' . $tahun ?></h4>

  <form name="formcari" id="formcari" action="" method="get">
        
            
                <!-- <tbody>
                    <tr>
                        <td>Nama</td> 
                        <td>:</td>  
                        <td> -->
                            <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> 
                            <!-- <select class="form-control" data-live-search="true" name="id_guru" id="id_guru">
                                <option>Semua</option>
                                <?php
                                $sql = "select * from data_guru";
                                $result = @mysql_query($sql);
                                while ($row = @mysql_fetch_array($result)) {
                                    echo "<option name='id_guru' value=$row[id_guru]> $row[nama]</option>";
                                }
                                ?>
                            </select>             
                        </td>
                    </tr>

                    <tr>
                        <td>Bulan</td>  
                        <td>:</td>  
                        <td>              
                                <select class="form-control" name="bulan" value="" >
                                    <option>01</option>
                                    <option>02</option>
                                    <option>03</option>
                                    <option>04</option>
                                    <option>05</option>
                                    <option>06</option>
                                    <option>07</option>
                                    <option>08</option>
                                    <option>09</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                </select>
                            
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>Tahun</td>  
                        <td>:</td>  
                        <td>              
                               
                            <select class="form-control" name="tahun" >
                                    <option>2022</option>
                                    <option>2023</option>
                                    <option>2024</option>
                                    
                                </select>
                        </td>
                    </tr>
                    
                     <tr>
                        <td></td> 
                        <td></td> 
                        <td>              
                               
                           <input type="submit" value="cari" class="btn btn-primary">
                        </td>
                    </tr>
                </tbody> -->
                          
        
    </form>
    
    <div class="table-container">
      <table class="tblcms2">

   <tr style="background-color: mediumaquamarine;">

    <td class="center" style="background-color:" rowspan="3">
      No
    </td>
    <td class="center" style="background-color:" rowspan="3">
      Nip
    </td>
    
    <td class="center" style="background-color:"  rowspan="3" >
     Nama
   </td>
   
   

    

   

    <td  class="center" colspan="31"><center>Tanggal</center></td>
   

  <!-- <td  class="center" colspan="10"><center>Status</center></td> -->
   <!-- <td  class="center" ></td>
    <td  class="center" ></td>
     <td  class="center" ></td>
     <td  class="center" ></td> -->
  
</tr>

<tr style="background-color: antiquewhite;">
  <?php
   for ($i = 1; $i <= $jumlah_hari; $i++) {
    
     
     
    ?>

    <td  class="center"><?php echo $i; ?></td>
    
    <?php
  } ?>
  
    <!-- <td>H </td>
    <td>T </td>
    <td>S </td>
    <td>I </td>
    <td>A </td> -->
    

</tr>
<tr style="background-color: antiquewhite;">
  
  <?php
  for ($i = 1; $i <= $jumlah_hari; $i++) {
    
    
    ?>
    <td  class="center" style="font-size: 10px;"><center>Jam Masuk</center></td>
    
    <?php
  } ?>
    <!-- <td>H </td>
    <td>T </td>
    <td>S </td>
    <td>I </td>
    <td>A </td> -->
    
  
</tr>
   

<?php

$H = 0;
$TK = 0;
$CT = 0;
$WFH = 0;
$S = 0;

if (isset($_GET['id_guru']))
{
    $id_guru = $_GET['id_guru'];
    if ($id_guru == "Semua")
    {
        $querytabel = "SELECT * FROM data_guru  ";
    }
    else
    {
    $querytabel = "SELECT * FROM data_guru where id_guru='$id_guru' ";    
    }
    
}
else
{
$querytabel = "SELECT * FROM data_guru  ";    
}

$no = 0;
$proses = mysql_query($querytabel);
while ($data = mysql_fetch_array($proses)) {

  $id_guru = $data['id_guru'];
  $status_guru = $data['status_guru'];
  ?>
  <tr>
    <td align="center" style="font-size: 10px;background-color: antiquewhite;" width="50"><?php $no = $no + 1; echo $no; ?></td>
   <td class="center" style="font-size: 10px;background-color: antiquewhite;">
     <b><?php echo $data['nis']; ?></b>
   </td>
   <td class="center" style="font-size: 10px;background-color: antiquewhite;">
     <b><?php echo $data['nama']; ?></b>
   </td>
   <?php for ($i = 1; $i <= $jumlah_hari; $i++) {
    if (strlen($i) == 1)
    {
      $i = "0".$i;
    }
    $status = "";  
    $tanggal = $tahun."-".$bulan."-".$i;
    $masuk = baca_database("","jam","select * from data_absensi where tanggal like '%$tanggal%' and id_guru='$id_guru'");
    $statusnya = baca_database("","status","select * from data_absensi where tanggal like '%$tanggal%' and id_guru='$id_guru'");
    $cek = cek_database("","","","select * from data_absensi where tanggal like '%$tanggal%'");
    
    if ($status_guru == "sprinter")
    {
      $absen = "$tanggal 05:00:00";    
    }
    else
    {
      $absen = "$tanggal 08:00:00";
    }
    
    
    // $jadwal = "$masuk";
    
    
    
    if ($tampil == "semua")
    {
      $day = 31;
      
    }
    else
    {
      $day = date('d');
    }
    
    if ($day>=$i)
    {
     if ($cek == "ada")
     {
      
      if (strtotime($jadwal) > strtotime($absen))
      {
          
        $status = "terlambat";
        $warna = "orange";
      }
      else
      {
          
          
        $status = "$statusnya";
        $warna = "#b9ea44";
        
      }
      
      if ($masuk == "")
      {
        $status = "TK";
        $warna = "#ff9d9d";
      }
      
    }
    else
    {
      $warna = "white";
    }
  }
  else
  {
   $warna = "white";
 }
 
 if ($status) {
     
 }

 
$blue = "#8acde1";
$green = "#5eed64";
$oranye = "#e5a443";
  
  // echo $masuk;
  // echo "<br>";
  // echo $status;
  ?>
  <?php 
  if ($status == "H" )
  {
     ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $green;?>">
    <table >
        
        <td><?php echo $masuk; ?></td>
        <td><?php echo $status; ?></td>
        
    </table>
  <?php 
      $H = $H +1;
  }
  else if($status == "WFH" )
  {
      $WFH = $WFH +1;
      ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $warna;?>">
    <table>
        <td><?php echo $masuk; ?></td>
        <td><?php echo $status; ?></td>
    </table>
  <?php 
  }
  else if($status == "S" )
  {
      $S = $S +1;
      ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $blue;?>">
    <table>
        <td><?php echo $masuk; ?></td>
        <td><?php echo $status; ?></td>
    </table>
  <?php 
  }
  else if($status == "CT" )
  {
      $CT = $CT +1;
      ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $oranye;?>">
    <table>
        <td><?php echo $masuk; ?></td>
        <td><?php echo $status; ?></td>
    </table>
  <?php 
  }
  else if($status == "TK" )
  {
      $TK = $TK +1;
           ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $warna;?>">
    <table>
        
        <td><?php echo $status; ?></td>
    </table>
  <?php 
  }
  else
  {
      ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $warna;?>">
    <table style=" margin-top: -19px; margin-bottom: -19px; margin-left: -9px; margin-right: -9px; width: 51px; height: 51px;">
        <td><?php echo $masuk; ?></td>
        <td><?php echo $status; ?></td>
    </table>
  <?php 
  }
  

  ?>
</td>

<?php


} ?>

<!-- <td>
<?php echo $H;  $H=0;?>
</td>

<td>
<?php echo $WFH;  $WFH=0;?>
</td>


<td>
<?php echo $S;  $S=0;?>
</td>

<td>
<?php echo $CT;  $CT=0;?>
</td>


<td>
<?php echo $TK;  $TK=0;?>
</td> -->


</tr>

<?php } ?>
</table>
   </div>
<h4>Keterangan:<br>
<p>S: Sakit</p>
<p>CT: Cuti</p>
<p>WFH: Work From Home</p>
<p>TK: Tanpa Keterangan</p>
<p>H: Hadir</p>
</h4>
    <!-- BODY -->

    <!-- FOOTER -->
    <p class="auto-style3"><?php echo $formatwaktu; ?>
    </p>
    <p class="auto-style3"><?php echo $ttd; ?></p>
    <p class="auto-style3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </p>
    <p class="auto-style3"><?php echo $siapa; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
    <p class="auto-style3"></p>

<?php } ?>
