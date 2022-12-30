<!DOCTYPE html>
<html>

<head>

    <?php


    $namaaplikasi = "face recognition";
    $lokasi = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $lokasi_request = $_SERVER['REQUEST_URI'];
    ?>
    <title> <?php echo $namaaplikasi; ?> </title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    -
    <script src="face-api.js"></script>

</head>

<body onload="getLocation();">

<br>
<br>

<style>
    body {
        background: url(https://img.freepik.com/free-vector/white-background-with-blue-tech-hexagon_1017-19366.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<center>
<table>
<tr>
<td align="center"><img src="admin/data/image/logo/logo.png" width="100px"></td>
<td><h1><font color='black'>&nbsp;&nbsp;PRESENSI GURU SMK N 1 LENANGGUAR&nbsp;&nbsp;</font></h1></center></td>
<td align="center"><img src="admin/data/image/logo/logo.png" width="100px"></td>

</tr>
</table>

<br>


    <div class="margin" style="position: relative; float:left; border: 3px solid #fbd84a;
      
      padding-bottom: 12px;
      padding-top: 13px;
      border: 3px solid #fbd84a;
      background-color: black;

      ">

        <video id="vidDisplay" style="height: 500px; width: 670px; display: inline-block; vertical-align: baseline;"
               onloadedmetadata="onPlay(this)" autoplay="true"></video>
        <canvas id="overlay" style="position: absolute; top: 0; left: 0;" width="1200" height="800"/>
    </div>


    <div id="parent2" style="position: relative;
    float: right;
    border: 3px solid #fbd84a;
    padding-right: -1px;
    margin-right: 20px;
    background-color: grey;">
        <br>
        <center>
            <?php
            if (isset($_POST['nama'])) {
                ?>
                <button id="register" class="button button1" style="background-color: #0f47a1;"> Pendaftaran Wajah
                </button>
                <button id="login" class="button button1" style="background-color: #0f47a1;"> Pengenalan Wajah</button>
            <?php } else { ?>
                <button id="login" class="button button1" style="background-color: #0f47a1;"> Pengenalan Wajah</button>
                <form class="myForm" action="" method="post" autocomplete="off">
    <input type="hidden" name="latitude" id="latitude" value="">
    <input type="hidden" name="longitude" id="longitude" value="">
    <!-- <button type="submit" name="submit">Submit</button> -->
</form>
            <?php } ?>
        </center>
        <br>

        <img id="prof_img"
             style=" height:200px; width: 200px; border: 3px solid black; border-radius: 10px;"></img><br><br>
        <div id="siapa"
             style=" text-align: center; font-size: 23px; font-family:Lucida Console,Monaco,monospace; font-weight: bold; margin-bottom: 50px;">
            ... Deteksi Wajah ...
        </div>
        <div id="reg_disp" style="display: none;">
            <input id="fname"
                   style="margin-left:50px; margin-right:50px; width:500px; height: 30px; border-radius: 5px; border:1px solid black;"
                   type="readonly" value="<?php echo $_POST['nama']; ?>" placeholder="Nama : "></input><br></br>            

            <button id="capture" class="button button1" style="margin-left: 220px;height:72px;"> Simpan
                Wajah
            </button>
            <br>
            <div id="tries"
                 style=" text-align: center; font-size: 23px; font-family:Lucida Console,Monaco,monospace; font-weight: bold;">
                Jumlah :
            </div>
            <br>
        </div>

        <div id="log_disp">

            <div id="logname"
                 style="font-size: 35px; font-weight: bold; margin-left: 40px; width: 570px; white-space: pre-wrap; text-align: center;">
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition,showError);

        }
    }

    function showPosition(position){
        document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
        document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
    }
    function showError(error){
        switch(error.code){
        case error.PERMISSION_DENIED:
        alert("You Must Allow The Request For Geolocation To Fill Out The Form");
        location.reload();
        break;
        }
    }
</script>
</body>
<br>
<br>
<br>
<br>

<?php include 'deteksiwajah.php'; 
function id_otomatis($nama_tabel,$id_nama_tabel,$panjang_id)
{
    $cek = mysql_query("SELECT * FROM $nama_tabel");
    $rowcek = mysql_num_rows($cek);
    
    
        $kodedepan = strtoupper($nama_tabel);
        $kodedepan = str_replace("DATA_","",$kodedepan);
        $kodedepan = str_replace("DATA","",$kodedepan);
        $kodedepan = str_replace("TABEL_","",$kodedepan);
        $kodedepan = str_replace("TABEL","",$kodedepan);
        $kodedepan = str_replace("TABLE_","",$kodedepan);
        $kodedepan = strtoupper(substr($kodedepan,0,3));
        $id_tabel_otomatis = $kodedepan.date('YmdHis');
        $min = pow($panjang_id, 3 - 1);
        $max = pow($panjang_id, 3) - 1;
        
        $kodeakhir = mt_rand($min, $max);
        return $id_tabel_otomatis.$kodeakhir;
}
?>


</html>