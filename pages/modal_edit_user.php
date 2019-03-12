<?php
    include "dbcon.php";
	$username=$_GET['username'];
	$data=mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username'");
	while($r=mysqli_fetch_array($data)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit User</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_user.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="User Name">Username</label>
     				<input type="text" name="username"  class="form-control" value="<?php echo $r['username']; ?>" readonly>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="nama lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap"  class="form-control" value="<?php echo $r['nama_lengkap']; ?>" >
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="password">Password</label>
                    <input type="text" name="password"  class="form-control" value="<?php echo $r['password']; ?>">
                </div>


                <div class="form-group" style="padding-bottom: 20px;">
                  <label class="col-lg-2 row" for="hak akses">Akses</label>
                    <select name="level" class="form-control">
                        <option >Level Akses</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div>





	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>