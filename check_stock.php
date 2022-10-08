<?php include'config/db_connect.php';
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
  header('location:index.php');
  exit();
}
   $from = "";
   $to = "";
   $sql = "SELECT * FROM stockin A  INNER JOIN product B ON A.pro_id = B.pro_id INNER JOIN category C ON B.cate_id = C.cate_id";
   $result = $connect->query($sql);  
?>
<?php include 'header.php';?>

          <div class="row">
            </div>
                 <div class="panel panel-default">
                   <div class="panel-body">
                     <h3 class="text-primary">Check Dialy Stock</h3>
                     <hr>
                   <form class="form-inline" method = "post" action="">
                      <div class="form-group">
                        <label for="email">From:</label>
                        <input type="text" class="form-control" id="datepicker" name = "from">
                      </div>
                      <div class="form-group">
                        <label for="pwd">To:</label>
                        <input type="text" class="form-control" id="datepicker1" name = "to"> 
                      </div>
                      <button type="submit" name="search" class="btn btn-success">Filter</button>
                      <a href="stock.php" class="btn btn-danger"><i class="fa fa-undo" aria-hidden="true"></i> Back</a>
                  </form>
                  </div>
                  <div class="panel-body">
                      <div class="table-responsive">
                                <table id="example" class="display nowrap" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category</th>
                                            <th>Code</th>
                                            <th>Name(En)</th>
                                            <th>Name(Kh)</th>
                                            <th>Amount In</th>
                                            <th>Amount Out</th>
                                            <th>Balance</th>
                                            <th>Amount Price</th>
										                      	<th>Amount Cost</th>
                                            <th>profit</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (isset($_POST['search'])) {
                                                $from = $_POST['from'];
                                                $to = $_POST['to'];
                                                $i = 1;
                                            while($row = $result->fetch_assoc()) 
                                            {     
                                             
                                              $v2=$row["code_in"];
                                              $v3=$row["name_en"];
                                              $v4=$row["name_kh"];
                                              $v5=$row["qty_in"];
										                          $v8 = $row["price"];
                                              $v9 = $row["price_dolla"];
                                             
                                          ?>
                                          <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $row['category_name'] ?></td>
                                            <td><?php echo $v2;?></td>
                                            <td><?php echo $v3;?></td>
                                            <td><?php echo $v4;?></td>
                                            <td><?php echo $v5;?></td>
                                            <td><?php $sum = " SELECT sum(qty_out) FROM stockout WHERE (date_out BETWEEN '$from' AND '$to') AND code_out = '$v2' "; 
                                            $result1 = $connect->query($sum);
                                            for($i=0; $row1 = $result1->fetch_assoc(); $i++){
                                            $v6=$row1['sum(qty_out)'];
                                              }
                                              echo number_format(round((int)$v6,2));
                                              ?>
                                            </td>
                                            <td><?php  $v7 = $v5 - $v6; echo $v7;?></td>
                                            <!-- <td><?php $balan1 = $v6 * $v9; echo $balan1;?></td> -->
                                            
                                            <td><?php $sum = " SELECT sum(amount) FROM stockout WHERE (date_out BETWEEN '$from' AND '$to') AND code_out = '$v2' "; 
                                            $result1 = $connect->query($sum);
                                            for($i=0; $row1 = $result1->fetch_assoc(); $i++){
                                            $balan1=$row1['sum(amount)'];
                                              }
                                              echo number_format(round((float)$balan1,2),2);
                                              ?>
                                            </td>
                                             <td><?php $balan = $v6 * $v8; echo number_format(round((float)$balan,2),2);?></td>
                                            <td><?php $balan2 = $balan1 - $balan; echo number_format(round((float)$balan2,2),2);?></td>
                                            <td>
                                            <?php
                                                if($v7 <= 5 & $v7 > 0){
                                                 echo '<span class="label label-warning">Low Stock</span>';
                                                }
                                                elseif ($v7 <= 0 ){
                                                   echo '<span class="label label-danger">Out Of Stock</span>';
                                                }
                                                else{
                                                   echo '<span class="label label-success">Available</span>';
                                                }
                                            ?>  
                                            </td>

                                          </tr> 

                                          <?php
                                              }
                        
                                            }  
                                          ?>
                                    </tbody>
                                </table>
                           </div>
                  </div>
                </div>
        
 <?php include 'footer.php';?>