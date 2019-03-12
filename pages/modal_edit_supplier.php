
<?php
    include "dbcon.php";
	$kode_supp=$_GET['kode_supp'];
	$supplier=mysqli_query($koneksi,"SELECT * FROM supplier WHERE kode_supp='$kode_supp'");
	while($r=mysqli_fetch_array($supplier)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Supplier</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_supplier.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Id beli">Kode Supplier</label>
     				<input type="text" name="kode_supp"  class="form-control" value="<?php echo $r['kode_supp']; ?>" readonly>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="kode_beli">Nama Supplier</label>
                    <input type="text" name="nama_supp"  class="form-control" value="<?php echo $r['nama_supp']; ?>" >
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="Jumlah Barang">alamat supplier</label>
                    <input type="text" name="alamat_supp"  class="form-control" value="<?php echo $r['alamat_supp']; ?>">
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