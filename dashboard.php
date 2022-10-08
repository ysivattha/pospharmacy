<?php 
include'config/db_connect.php';
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
  header('location:index.php');
  exit();
}
$sql1 = "SELECT * FROM stockin WHERE qty_in - qty_left <= 3 ";
$result1 = $connect->query($sql1);
$countlow = $result1->num_rows;

$sql2 = "SELECT * FROM product";
$result2 = $connect->query($sql2);
$countlow1 = $result2->num_rows;

$sql3 = "SELECT * FROM stockin";
$result3 = $connect->query($sql3);
$countlow2 = $result3->num_rows;

$out = "SELECT sum(amount) FROM invoice ";
$resout = $connect->query($out);
    for($i=0; $row2 = $resout->fetch_assoc(); $i++){
    $subtotal2=$row2['sum(amount)'];
  }

$connect->close();

?>
<?php include 'header.php';?>
	 <!-- Content Header (Page header) -->
    
      
      <div class="panel">
      <div class="panel-heading">
          <section class="content-header">
    <img src = "img/header-man.png" style = "width:100%;height: 180px">
        <h2 class="text-primary"><i class="fa fa-home" aria-hidden="true"></i> Home</h2>
      <!-- </br> -->
      <hr style="border:2px solid #3C8DBC">
    </section>
      </div>
	  <?php
		if($show['position_id'] == 1){
	  ?>
	     <div class="panel-body">
          <div class="row">
        <div class="col-md-3 col-xs-12">
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
        <div class="col-md-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h4>លក់</h4>

              <p>Sale</p>
            </div>
            <div class="icon">
               <i class="ion ion-cash"></i>
            </div>
            <a href="sale.php?cash=cash&invoice=<?php echo $finalcode ?>" class="small-box-footer">more info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
         
        </div>
        <!-- ./col -->
        <div class="col-md-3 col-xs-12"> 
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h4>គ្រប់គ្រង ស្តុក</h4>
              <p>Stock Managerment</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
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
        <div class="col-md-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>ទំនិញក្នុងឃ្លាំង</h4>
                <p>Merchandises In Stock</p>
             <span class="info-box-number" style="color:white";>មាន​ : <?php echo $countlow2; ?> <small>Item(S) </small></span>
            </div>
            <div class="icon">
              <i class="fa fa-database" aria-hidden="true"></i>
            </div>
            <a href="stock_balance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h4>ទំនិញជិតអស់</h4>
                <p>Almost Exhausted Merchandises</p>
             <span class="info-box-number" style="color:white";>មាន​ : <?php echo $countlow; ?> <small>Item(S) </small></span>
            </div>
            <div class="icon">
              <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
            </div>
            <a href="stock_balance.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h4>ចំណូលសរុប</h4>
                <p>Total Income</p>
          <span class="info-box-number">$ <?php echo $subtotal2?></span>
            </div>
            <div class="icon">
              <i class="fa fa-usd" aria-hidden="true"></i>
            </div>
            <a href="invoices.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-md-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h4>សរុបមុខទំនិញ</h4>
              <p>Total Merchandises</p>
           <span class="info-box-number" style="color:white";>មាន​ : <?php echo $countlow1; ?> <small>Item(S) </small></span>
            </div>
            <div class="icon">
             <i class="fa fa-clone" aria-hidden="true"></i>
            </div>
            <a href="product.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      </div>  
	  <?php
		}else{
	  ?>
	  
	  <?php 
		}
	  ?>
    
    </div>
<?php include 'footer.php';?>
