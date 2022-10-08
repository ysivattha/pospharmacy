<?php include'config/db_connect.php';
ob_start();
session_start();
if(empty($_SESSION['user_id'])) {
	header('location:index.php');
	exit();
}
$errors = "";
    if(isset($_GET["id"])){
		$id = $_GET["id"];
		$sql = "SELECT * from user where id = $id";
		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_array($result);	
	}	
	if(!empty($_POST["id"])){
			$id = $_POST["id"];
			$user = $_POST["user"];
			$pass = $_POST["pass"];
			$pos = $_POST["pos"];

			$sql = "UPDATE  user SET 
			 						username = '$user', 
			 						password = md5('$pass'),
			 						position_id = '$pos'
			 								WHERE
			 							  id = '$id'"; 
			$result = mysqli_query($connect, $sql);
			 if ($result) {
				 header('location:user.php?message=update');	
			 } 
		}
?>
<?php include 'header.php';?>
      <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                	<h3 class="text-primary">Edit User</h3>
                	<hr>
                </div>
                   	<div class = "panel-body">
						<div class="col-md-12">
							 <form class="form-horizontal" data-toggle="validator" role="form" method="POST" acion = "">
                        <div class="form-group">
                           <label class="control-label col-sm-2" for="email">Username:</label>
                           <div class="col-sm-8">
                              <input type="hidden" name="id" value = "<?php echo $row['id']?>"> 
                             <input type="text" id="inputName" required class="form-control" name = "user" placeholder="" value="<?php echo $row['username']?>">
                           </div>
                        </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="email">Position:</label>
                                <div class="col-sm-8">
                                <select class="form-control"  name="pos">
                                <?php
                                   $select1 = "select * from position";
                                   $query1  = mysqli_query($connect,$select1);
                                   while($row1 = $query1->fetch_assoc()):
                                   $selected=($row['position_id']==$row1['position_id']?"selected":"");
                                ?>
                                  <option <?= $selected; ?> value="<?= $row1['position_id']; ?>"><?= $row1['position']; ?></option>
                                <?php endwhile; ?>
                                </select>
                                </div>
                         </div>
                          <div class="form-group">
                         <label class="control-label col-sm-2" for="email">New Password:</label>
                         <div class="col-sm-8">
                           <input type="password" data-minlength="6" id="inputPassword" class="form-control" name = "pass" placeholder="" value="">
                           <div class="help-block">Note : Minimum of 6 characters</div>
                         </div>
                      </div>
                           <div class="form-group">
                         <label class="control-label col-sm-2" for="email">Confirm Password:</label>
                         <div class="col-sm-8">
                             <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Sorry, These don't match" placeholder="Confirm" required>
							<div class="help-block with-errors"></div>
                         </div>
                      </div>
                      <div class="form-group">
                         <div class="col-sm-offset-2 col-sm-10">
                           <button type="submit" class="btn btn-success btn-sm" name = "edit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                             <a href="user.php" class = "btn btn-danger btn-sm">Back</a>
                         </div>
                      </div>
                    </form>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include 'footer.php';?>
