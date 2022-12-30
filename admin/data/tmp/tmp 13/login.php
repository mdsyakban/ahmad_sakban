<?php 
include '../include/function/login.php';
$default_url = '../data/tmp/tmp 13';
$tema = '13-Bootstrap-Admin-Theme-3-master/';
$url = $default_url.'/'.$tema;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo $url;?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url;?>css/styles.css" rel="stylesheet">

  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="<?php index(); ?>"><b>FORM LOGIN</a></h1>
	              </div>
	           </div>
	        </div>
	     </div> 
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Silahkan masukkan username dan passwordn</h6>
			                <form action="" method="post">
      <div class="form-group has-feedback">
      	<dl>
                		<dt>
                			<label style="color:black;">Hak Akses</label>
                			</dt>
                			<dd><select class="form-control" name="siapa" type="text" placeholder="Username" >
                				  <option value="admin">Admin</option>
                                   <option value="kepsek">Kepsek</option>
                			</select></dd>
                			
                		
                	</dl>                	
        <input type="text" name="username" class="form-control" placeholder="Username">
       
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
       
      </div>
      <div class="row">
        <div class="col-xs-12">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		 <a href="../../" class="btn btn-primary btn-block btn-flat"><center>Cancel</center></a>
          
        </div><div class="col-xs-4">
		 
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
			            </div>
			        </div>

			        <div class="already">
			            <?php echo $copyright;?>
						<br>
			            
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>