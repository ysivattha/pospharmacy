<?php include'config/db_connect.php';
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
  header('location:index.php');
  exit();
}
?>
<?php include 'header.php';?>
	<div class="container">  
		<div class = "col-xs-12 col-md-10">   
      <div class="panel panel-default">
          <div class="panel-body">
              <h3 class="text-primary">About System</h3>
              <hr>
               <img src="img/about.jpg"  class = "img-responsive" style = "width:100%"> 
          </div>
      </div>     
		 
		</div>
	</div>	
<?php include 'footer.php';?>
