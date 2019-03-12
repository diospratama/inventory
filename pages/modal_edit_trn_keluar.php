
<?php
    include "dbcon.php";
	$id=$_GET['id_jual'];
	$detail_jual=mysqli_query($koneksi,"SELECT * FROM detail_jual WHERE id_jual='$id'");
	while($r=mysqli_fetch_array($detail_jual)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Jumlah Barang Keluar</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_trn_keluar.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Id jual">Id Jual</label>
     				<input type="text" name="id_jual"  class="form-control" value="<?php echo $r['id_jual']; ?>" readonly>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="kode_jual">Kode Jual</label>
                    <input type="text" name="kode_jual"  class="form-control" value="<?php echo $r['kode_jual']; ?>" readonly>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Kode Barang">Kode Barang</label>
                    <input type="text" name="kode_barang"  class="form-control" value="<?php echo $r['kode_barang']; ?>" readonly>
                </div>
                


                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Jumlah Barang">Jumlah Jual</label>
                    <input type="text" name="jml_jual"  class="form-control" value="<?php echo $r['jml_jual']; ?>"/>
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