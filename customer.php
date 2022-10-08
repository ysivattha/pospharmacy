<?php include 'config/db_connect.php';
// check if user is not logged in 
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
	header('location:index.php');
	exit();
}
    $sql = "SELECT * FROM customer";

    $result = mysqli_query($connect, $sql);

//		 header('location:vender.php?message=success');
//        Cus
if(isset($_POST['btnadd'])){
        $no = $_POST['no'];
        $date = $_POST['date'];
        $cus_name = $_POST['cus_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $note = $_POST['note'];
        $id = $_POST['id'];
        $sql = "INSERT INTO customer (no, date, cus_name, phone, email, note,id) VALUES ('$no','$date', '$cus_name', '$phone', '$email', '$note','$id')";
            $result = mysqli_query($connect, $sql);
            if($result){
                header('location: customer.php?message=success');
            }
            else
                echo "ERROR";
            }
    else if(isset($_POST['btnupdate'])){
        $no = $_POST['no'];
        $date = $_POST['date'];
        $cus_name = $_POST['cus_name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $note = $_POST['note'];
         $id = $_POST['id'];
        $sql = "UPDATE customer SET 
                                   date = '$date',
                                   cus_name = '$cus_name',
                                   phone = '$phone',
                                   email = '$email',
                                   note = '$note',
                                   id = '$id'
                               WHERE no = '$no'";
        $result = mysqli_query($connect, $sql);
        if($result){
            header('location: customer.php?message=update');
        }else{
            echo "ERORR";
        }
    }
else if(isset($_GET["id"])){
     $id = $_GET["id"];

     $sql = "DELETE FROM customer WHERE no = '$id'";
     $result = mysqli_query($connect, $sql);
     if ($result) {
        header("location:customer.php?message=delete");
     }
} 
?>
<?php include 'header.php';?>
<div class="row">
    <div class="col-xs-12">
        <?php
                    if (!empty($_GET['message']) && $_GET['message'] == 'success') {
                      echo '<div class="alert alert-success">' ;
                      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                      echo '<h4>Success Add Customer</h4>';
                      echo '</div>';
                    }
                    else if (!empty($_GET['message']) && $_GET['message'] == 'update') {
                      echo '<div class="alert alert-info">' ;
                      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                      echo '<h4>Success Update Customer</h4>';
                      echo '</div>';
                    }
                    else if (!empty($_GET['message']) && $_GET['message'] == 'delete') {
                      echo '<div class="alert alert-danger">' ;
                      echo '<button type="button" class="close" data-dismiss="alert">&times;</button>'; 
                      echo '<h4>Success Delete Customer</h4>';
                      echo '</div>';
                    }
                    ?>
    </div>
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h2 class="text-primary">Customer</h2>
                <hr>
                <!--          Add New-->

                <!-- Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1"><i class="fa fa-user" aria-hidden="true"></i> Add New</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header  btn-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Customer</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <form method="post" enctype="multipart/form-data" action="">
                                        <input class="form-control" name="no" type="hidden">

                                        <div class="form-group col-xs-6">
                                            <label for="">ID :</label>
                                            <input class="form-control" autocomplete="off" required name="id" type="text" placeholder="Enter ID" >
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="">Customer Name :</label>
                                            <input class="form-control" required name="cus_name" type="text" placeholder="name">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="">Phone :</label>
                                            <input class="form-control" required name="phone" type="text">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="">Email :</label>
                                            <input class="form-control" name="email" type="email" placeholder="example@mail.com">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="">Date :</label>
                                            <input class="form-control" autocomplete="off" required name="date" type="text" placeholder="m/d/y" id="date">
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label for="note">Note:</label>
                                            <textarea class="form-control" rows="4" id="note" name="note"></textarea>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <button type="submit" name="btnadd" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="display nowrap" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th>No</th>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>E-mail
                                    <th>Note</th>
                                    <th><i class="fa fa-cog" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                            $sql = "SELECT * FROM customer WHERE no >=1";
                                            $result = mysqli_query($connect, $sql);
                                        	$i= 1;
											while($row = $result->fetch_assoc()) 
											{		
												$c2=$row["date"];
                                                $cu=$row['id'];
                                                $c4=$row["cus_name"];
												$c5=$row["phone"];
												$c6=$row["email"];
												$c7=$row["note"];
										?>
                                <tr>
                                    <td>
                                        <?php echo $i++;?>
                                    </td>
                                    <td><?php echo $row['id'] ?></td>
                                    <td>
                                        <?php echo $c2;?>
                                    </td>
                                    <td>
                                        <?php echo $c4;?>
                                    </td>
                                    <td>
                                        <?php echo $c5;?>
                                    </td>
                                    <td>
                                        <?php echo $c6;?>
                                    </td>
                                    <td>
                                        <?php echo $c7;?>
                                    </td>
                                    <td>
                                        <!--				Edit-->
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#<?= $row['no']?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>

                                        <!-- Modal -->
                                        <div id="<?= $row['no']?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header  btn-primary">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Customer</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <form method="Post" action="" enctype="multipart/form-data">
                                                                <input type="hidden" value="<?= $row['no']?>" name="no">
                                         <div class="form-group col-xs-6">
                                              <label for="">Date :</label>
                                                     <input class="form-control date1" autocomplete="off" required name="date" type="text" placeholder="m/d/y" value="<?= $row['date']?>">
                                                              </div>
                                                 <div class="form-group col-xs-6">
                                                   <label for="">Customer Name :</label>
                                                                    <input class="form-control" required name="cus_name" type="text" value="<?= $row['cus_name']?>" placeholder="name">
                                                                </div>
                                                                <div class="form-group col-xs-6">
                                                                    <label for="">Phone :</label>
                                                                    <input class="form-control" name="phone" value="<?= $row['phone']?>" type="text">
                                                                </div>
                                                                <div class="form-group col-xs-6">
                                                                    <label for="">Email :</label>
                                                                    <input class="form-control" name="email" value="<?= $row['email']?>" type="email" placeholder="example@mail.com">
                                                                </div>
                                                                <div class="form-group col-xs-12">
                                                                    <label for="note">Note:</label>
                                                                    <textarea class="form-control" rows="4" id="note" name="note"><?= $row['note']?></textarea>
                                                                </div>
                                                                <div class="form-group col-xs-6">
                                                                    <button type="submit" name="btnupdate" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>Save change</button>
                                                                    <button type="reset" class="btn btn-default">Reset</button>
                                                                </div>
                                                                <div class="form-group col-xs-offset-10 col-xs-6">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!--                                                          <div class="modal-footer">-->
                                                    <div class="modal-footer">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                </div>

                <a onclick="return confirm('Are you sure to delete?');" href="customer.php?id=<?php echo $row['no']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
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