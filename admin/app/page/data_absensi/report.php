<br>
<a href="<?php index(); ?>">
    <?php btn_kembali(' KEMBALI'); ?>
</a>





<?php
ini_set('date.timezone', 'Asia/Jakarta');
$tanggal = date('Y-m');
$ubah = strtotime($tanggal);
$bulan = date('m', $ubah);
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

  


  
  <h4>Bulan : <?php echo ($bulan) . '-' . $tahun ?></h4>

  <form name="formcari" id="formcari" action="" method="get">
        <fieldset> 
            <table>
                <tbody>
                    <tr>
                        <td>Nama</td> 
                        <td>:</td>  
                        <td>
                            <!-- <input value="" name="Berdasarkan" id="Berdasarkan" > --> 
                            <select class="form-control" data-live-search="true" name="id_guru" id="id_guru">
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
                </tbody>
            </table>                  
        </fieldset>
    </form>

  <table  border="1" class="table hover" style="border-color: currentColor;">
   <tr style="background-color: mediumaquamarine;">
    <td class="center" style="background-color:" rowspan="2">
      No
    </td>
    <td class="center" style="background-color:" rowspan="2">
      Nip
    </td>
    
    <td class="center" style="background-color:"  rowspan="2" >
     Nama
   </td>
   <?php
   for ($i = 1; $i <= $jumlah_hari; $i++) {
    
     
     
    ?>
    <td  class="center" ><?php echo $i; ?></td>
    <?php
  } ?>
  <td  class="center" colspan="">Status</td>
   <td  class="center" ></td>
    <td  class="center" ></td>
     <td  class="center" ></td>
     <td  class="center" ></td>
  
</tr>

<tr style="background-color: antiquewhite;">
  
  <?php
  for ($i = 1; $i <= $jumlah_hari; $i++) {
    
    if (strlen($i) == 1)
    {
      $i = "0".$i;
    }
    $tanggal = $tahun."-".$bulan."-".$i;
    $namahari = date('l', strtotime($tanggal));
    
    ?>
    <td  class="center" style="font-size: 10px;" ><?php echo substr(hariIndo($namahari),0,3); ?></td>
    
    <?php
  } ?>
    <td>H </td>
    <td>T </td>
    <td>S </td>
    <td>I </td>
    <td>A </td>
    
  
</tr>
   

<?php

$hadir = 0;
$alfa = 0;
$izin = 0;
$terlambat = 0;
$sakit = 0;

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
    
    
    // $jadwal = "$tanggal $masuk";
    
    
    
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
        $status = "x";
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
 
 
 ?>
 <td class="center" style="font-size: 10px;background-color:<?php echo $warna;?>">
  <?php 
  
  echo $masuk;
  echo "<br>";
  echo $status;
  
  if ($status == "hadir" )
  {
      $hadir = $hadir +1;
  }
  else if($status == "terlambat" )
  {
      $terlambat = $terlambat +1;
  }
  else if($status == "sakit" )
  {
      $sakit = $sakit +1;
  }
  else if($status == "izin" )
  {
      $izin = $izin +1;
  }
  else if($status == "x" )
  {
      $alfa = $alfa +1;
  }
  else
  {
      
  }
  

  ?>
</td>

<?php


} ?>

<td>
<?php echo $hadir;  $hadir=0;?>
</td>

<td>
<?php echo $terlambat;  $terlambat=0;?>
</td>


<td>
<?php echo $sakit;  $sakit=0;?>
</td>

<td>
<?php echo $izin;  $izin=0;?>
</td>


<td>
<?php echo $alfa;  $alfa=0;?>
</td>


</tr>

<?php } ?>

</table>