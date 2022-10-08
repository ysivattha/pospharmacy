<?php
	 include 'config/db_connect.php';
	ob_start();
	session_start();
	if(empty($_SESSION['user_id'])) {
	  header('location:index.php');
	  exit();
	date_default_timezone_set('Asia/Phnom_Penh');
	$time = date("d-m-y h:i:A");
?>
<?php include 'header.php';?>
		
		<form action="save_sale.php" method="post">
		<div class = "row">
			<div class = "col-md-12">
				<div class = "col-md-12">
				<a href="inv.php?id=<?php echo $_GET['pt']; ?>&invoice=<?php echo $_GET['invoice'];?>" class = "btn btn-danger">Back To Sale</a>
				</div>
			</div>
		</div>
		</br>
		<div class = "row">
			<div class = "col-md-12">
				<div class = "col-md-5">
					<div class="panel panel-primary">
				  		  <div class="panel-heading">Information</div>
				  	  		<div class="panel-body">
				  	  			<center><h4><i class="fa fa-money" aria-hidden="true"></i>Cash</h4></center><hr>
				  	  			<div class="form-group col-xs-6">
										<label for ="">Date: <?php echo $time;?></label></br> 
										<label for ="">Invoice: <?php echo $_GET['invoice'];?></label> 
										<label for ="">Total: <?php echo $_GET['totalk'];?> $</label></br>
										
								</div>
								<input type="hidden" name="date" value="<?php echo $time; ?>" />
								<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
								<input type="hidden" name="amount" value="<?php echo $_GET['total']; ?>" />
								<input type="hidden" name="amountk" value="<?php echo $_GET['totalk']; ?>" />
								<input type="hidden" name="ptype" value="<?php echo $_GET['pt']; ?>" />
								<!-- <input type="hidden" name="cashier" value="<?php //echo $_GET['cashier']; ?>" /> -->
							<center>
								<select name = "cname" class=" select2" style = "width:100%" required="">
								        <option value="">Select Customer</option>
			                                  <?php
			                                    $cus = mysqli_query($connect,"SELECT * FROM customer");
			                                    while ($row1 = mysqli_fetch_assoc($cus)) { ?>
			                                    <option value="<?php echo $row1['cus_name']; ?>"><?php echo $row1['cus_name'];?></option>
			                                  <?php 
			                                  }
			                                   ?>   
								     </select>
								     </br>
								     </br>
							     <!--  <div class="suggestionsBox" id="suggestions" style="display: none;">
							        <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
							      </div> -->
							      
							      <?php

								$cash = $_GET['pt'];
								if($cash == 'credit') {
								?>Due Date: <input type="date" name="due" placeholder="Due Date" style="width: 268px; height:30px; margin-bottom: 15px;" /><br>
								<?php
								}
								if($cash == 'cash') {
								?>
								<input type="number" name="cash" class = "form-control" placeholder="Cash"  required/><br>
								<?php
								}
								?>
								<button class="btn btn-success btn-block"><i class="icon icon-save icon-large"></i>Save</button>
								
							</center>
				  	  		</div>
				 	</div>
				</div>
				<div class = "col-md-7">
					<div class="panel panel-primary">
					    <div class="panel-heading">Invoice</div>
					    <div class="panel-body">
					  		<div class="table-responsive">          
				 	 <table class="table">
				  	<thead>
					  <tr>
					  	<?php
					  	$id=$_GET['invoice'];
						?>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>

					  </tr>
					</thead>
					<thead>
					  <tr>
						<th>Barcode</th>
						<th>Name En</th>
						<th>Name Kh</th>
						<th>Qty</th>
						<th>Price</th>
						<th>Amount</th>
					
					  </tr>
					</thead>
					 <tbody>
			    <?php 
			    	$id=$_GET['invoice'];
			    	
			    	$sql = "SELECT * FROM stockout WHERE invoice = '$id' ";	
					$result = $connect->query($sql);
					while($row = $result->fetch_assoc()) 
						{			
							$barcode=$row["code_out"];
							$name_en=$row["pro_nameen"];
							$name_kh=$row["pro_namekh"];
							$qty=$row["qty_out"];
							$price='$'.$row["price"];
							$amount ='$'. $row['amount'];						
			    	?>
					      <tr>
					        <td><?php echo $barcode;?></td>
					        <td><?php echo $name_en;?></td>
					        <td><?php echo $name_kh;?></td>
					        <td><?php echo $qty;?></td>
					        <td><?php echo $price;?></td>
					        <td><?php echo $amount;?></td>
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
		</div>
	</form>
<?php include 'footer.php';?>