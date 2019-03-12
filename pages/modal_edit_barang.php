
<?php
    include "dbcon.php";
	$kode_barang=$_GET['kode_barang'];
	$data=mysqli_query($koneksi,"SELECT * FROM barang WHERE kode_barang='$kode_barang'");
	while($r=mysqli_fetch_array($data)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Barang</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_barang.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="kode barang">Kode Supplier</label>
     				<input type="text" name="kode_barang"  class="form-control" value="<?php echo $r['kode_barang']; ?>" readonly>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="nama barang">Nama Barang</label>
                    <input type="text" name="nama_barang"  class="form-control" value="<?php echo $r['nama_barang']; ?>" >
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="satuan">Satuan</label>
                    <input type="text" name="satuan"  class="form-control" value="<?php echo $r['satuan']; ?>">
                </div>

                 <div class="form-group" style="padding-bottom: 20px;">
                    <label for="harga jual">Harga Beli</label>
                    <input type="text" name="harga_beli"  class="form-control" value="<?php echo $r['harga_beli']; ?>">
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                    <label for="harga jual">Harga Jual</label>
                    <input type="text" name="harga_jual"  class="form-control" value="<?php echo $r['harga_jual']; ?>">
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