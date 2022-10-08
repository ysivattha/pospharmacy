<?php 
include'config/db_connect.php';
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
  header('location:index.php');
  exit();
}
include 'header.php';?>
	 <!-- Content Header (Page header) -->
    <section class="content-header">
	  <img class = "img-responsive" src = "img/2.PNG">
		<center><h3>
    Shop Managerment System 
      </h3></center>
    </section>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>វិក័យបត្រ័</h4>

              <p>Invoice</p>
            </div>
            <div class="icon">
              <i class="ion ion-printer"></i>
            </div>
			      <a href="invoices.php" class="small-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>លក់</h4>

              <p>Sale</p>
            </div>
            <div class="icon">
               <i class="ion ion-cash"></i>
            </div>
            <a href="inv.php?cash=cash&invoice=<?php echo $finalcode ?>" class="small-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6"> 
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>គ្រប់គ្រង ឃ្លាំងទំនិញ</h4>

              <p>Stock Managerment</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       <!--  <div class="col-lg-3 col-xs-6"> -->
          <!-- small box -->
          <!-- <div class="small-box bg-yellow">
            <div class="inner">
              <h4>គិតលុយភ្ញៀវ</h4>

              <p>Recieve Payment</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="recieve.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col 
        <div class="col-lg-3 col-xs-6">
          <!-- small box 
          <div class="small-box bg-red">
            <div class="inner">
               <h4>គ្រប់គ្រង ស្តុកមុខម្ហូប</h4>

              <p>Food Stock Managerment</p>
            </div>
            <div class="icon">
              <i class="ion ion-knife"></i>
            </div>
            <a href="food_stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
	<!-- 	<div class="col-lg-3 col-xs-6"> -->
          <!-- small box 
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>តុ​ ភ្ញៀវ</h4>
              <p>Table List</p>
            </div>
            <div class="icon">
              <i class="ion ion-funnel"></i>
            </div>
            <a href="table.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>-->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>អ្នកផ្គត់ផ្គង់ ទំនិញ</h4>

              <p>Vendor</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-cart"></i>
            </div>
            <a href="vender.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>តារាងបុគ្គលិក</h4>

              <p>Employee List</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="employee.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>របាយការណ៏</h4>

              <p>Report</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="stockin_record.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
		
        <!-- ./col -->
      </div>
<?php include 'footer.php';?>
