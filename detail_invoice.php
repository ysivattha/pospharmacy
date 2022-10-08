<?php include'config/db_connect.php';
ob_start();
session_start();

if(empty($_SESSION['user_id'])) {
    header('location:index.php');
    exit();
}
if(isset($_GET["id"])){
		$inv = $_GET["id"];
		$sql = "SELECT * from stockout where invoice = '$inv' ";
		$result = mysqli_query($connect, $sql);		
	}
?>
<?php include 'header.php';?>
	<ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Invoice Detail</li>
      </ol>
	<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="invoices.php" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example" class="display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <!-- <th>ID</th> -->
                                            <th>Invoice No</th>
                                            <th>Code</th>
                                            <th>Date</th>
                                            <th>Name(En)</th>
                                            <th>Name(KH)</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Amount</th>
                                            <th>Vat</th>
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											while($row = $result->fetch_assoc()) 
											{			
												// $v1=$row["vender_id"];
												$v1=$row["invoice"];
												$v2=$row['code_out'];
												$v3=$row["pro_nameen"];
												$v4=$row["pro_namekh"];
												$v5=$row["qty_out"];
												$v6=$row["price"];
												$v7=$row["amount"];
												$v8=$row["vat"];
												$v9=$row["date_out"];
												
										?>
										<tr>
											<!-- <td><?php //echo $v1;?></td> -->
											<td><?php echo $v1;?></td>
											<td><?php echo $v2;?></td>
											<td><?php echo $v9;?></td>
											<td><?php echo $v3;?></td>
											<td><?php echo $v4;?></td>
											<td><?php echo $v5;?></td>
											<td><?php echo $v6;?></td>
											<td><?php echo $v7;?></td>
											<td><?php echo $v8;?></td>
											
										</tr> 
										<?php
											}	 
										?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
<?php include 'footer.php';?>