
<?php
    include "dbcon.php";
	$id=$_GET['id_beli'];
	$detail_beli=mysqli_query($koneksi,"SELECT * FROM detail_beli WHERE id_beli='$id'");
	while($r=mysqli_fetch_array($detail_beli)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Jumlah Barang Masuk</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_trn_masuk.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Id beli">Id Beli</label>
     				<input type="text" name="id_beli"  class="form-control" value="<?php echo $r['id_beli']; ?>" readonly>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="kode_beli">Kode Beli</label>
                    <input type="text" name="kode_beli"  class="form-control" value="<?php echo $r['kode_beli']; ?>" readonly>
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Jumlah Barang">Kode Barang</label>
                    <input type="text" name="kode_barang"  class="form-control" value="<?php echo $r['kode_barang']; ?>" readonly>
                </div>
                


                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Jumlah Barang">Jumlah Beli</label>
                    <input type="text" name="jml_beli"  class="form-control" value="<?php echo $r['jml_beli']; ?>"/>
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