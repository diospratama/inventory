<?php
include "dbcon.php";
error_reporting();
session_start();
    if(isset($_SESSION['pengguna']) && isset($_SESSION['pass'])){//untuk mengecek 
    $pengguna=$_SESSION['pengguna'];  
    
        
        ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Spare Part Computer</title>
    
    <!--JQUERY-->
    <script src="../vendor/jquery/jquery.js"></script>
    <script src="../vendor/bootstrap/bootstrap.min.js"></script>
    <script src="../vendor/bootstrap/jquery.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Inventory Spare Part Computer</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            
                        </li>



                        <li>
                            <a href="admin.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>


                          <?php 
                            $kueri=mysqli_query($koneksi,"SELECT level AS nama FROM admin WHERE username='$pengguna'");
                            $rs = mysqli_fetch_array($kueri);
                            $akses=$rs['nama'];
                            
                            if(($akses=="admin")||($akses=="Admin")){
                            echo '<li>
                                    <a href="master_barang.php"><i class="fa fa-edit fa-fw"></i>Master Barang</a>
                                 </li>';
                             }
                             else{

                                echo '<li></li>';
                             }    
                        ?>

                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Transaksi Barang<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="barang_masuk.php">Barang Masuk</a>
                                </li>
                                <li>
                                    <a href="barang_keluar.php">Barang Keluar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="supplier.php"><i class="fa fa-table fa-fw"></i> Supplier</a>
                        </li>


                         <?php 
                            if(($akses=="admin")||($akses=="Admin")){
                            echo  '<li><a href="tambah.php"><i class="fa fa-edit fa-fw"></i> Manage User</a></li>';
                            }
                            else{echo '<li></li>';}  
                         ?>
                        <!--<li>
                            <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
                        </li>-->
                        <!--<li>
                            <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
                        </li>-->
                        <!--<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="panels-wells.html">Panels and Wells</a>
                                </li>
                                <li>
                                    <a href="buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="typography.html">Typography</a>
                                </li>
                                <li>
                                    <a href="icons.html"> Icons</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grid</a>
                                </li>
                            </ul>
                             /.nav-second-level 
                        </li>-->
                        <!--<li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Second Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                        <li>
                                            <a href="#">Third Level Item</a>
                                        </li>
                                    </ul>
                                    /.nav-third-level 
                                </li>
                            </ul>-->
                            <!-- /.nav-second-level 
                        </li>-->
                        <!--<li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            /.nav-second-level 
                        </li>-->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Transaksi Barang Masuk</h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php $p=isset($_GET['act'])?$_GET['act']:null; 
                                switch($p){
                                    default:
                             ?>
                            
                             <a href='?act=tambah' class='btn btn-primary'>Input Transaksi</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    
                                    <tr>
                                        <th>id Beli</th>
                                        <th>Kode Beli</th>
                                        <th>Kode Barang</th>
                                        <th>Jumlah Beli</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //$query="detail_beli.id_beli,h_beli.kode_beli,supplier.nama_supp,barang.nama_barang,detail_beli.jml_beli,detail_beli.harga_beli FROM detail_beli,h_beli,supplier,barang WHERE detail_beli.kode_barang=barang.kode_barang AND detail_beli.kode_beli=h_beli.kode_beli AND h_beli.kode_supp=supplier.kode_supp";
                                    $tampung=mysqli_query($koneksi,"SELECT * from detail_beli ");
                                    while($r1=mysqli_fetch_array($tampung)){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo  $r1['id_beli']; ?></td>
                                        <td><?php echo  $r1['kode_beli']; ?></td>
                                        <td><?php echo  $r1['kode_barang']; ?></td>
                                        <td><?php echo  $r1['jml_beli']; ?></td>
                                        <td> 
                                            <a href="#" class='edit' id='<?php echo $r1['id_beli']; ?>'>Edit</a>
                                            <a href="#" onclick="confirm_modal('proses_delete_trn_masuk.php?&id_beli=<?php echo  $r1['id_beli']; ?>');">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                            <a href="report_tran_barang_masuk.php" class='btn btn-success'  target="_blank"  >Cetak Laporan </a>
                         </div>  
                         <!-- Modal Popup untuk Edit--> 
                        <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        </div> 

                        <!-- Javascript untuk popup modal Edit--> 
                        <script type="text/javascript">
                           $(document).ready(function () {
                                $(".edit").click(function(e) {
                                    var m = $(this).attr("id");
                                    $.ajax({
                                       url: "modal_edit_trn_masuk.php",
                                       type: "GET",
                                       data : {id_beli: m,},
                           success: function (ajaxData){
                           $("#ModalEdit").html(ajaxData);
                           $("#ModalEdit").modal('show',{backdrop: 'true'});
                            }
                            });
                        });
                    });
                    </script>


                    <!-- Javascript untuk popup modal Delete--> 
                    <script type="text/javascript">
                        function confirm_modal(delete_url)
                        {
                          $('#delete').modal('show', {backdrop: 'static'});
                          document.getElementById('delete_link').setAttribute('href' , delete_url);
                        }
                    </script>

                    <!-- Modal Popup untuk delete--> 
                    <div class="modal fade" id="delete">
                      <div class="modal-dialog">
                        <div class="modal-content" style="margin-top:100px;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" style="text-align:center;">Are you sure to delete this ?</h4>
                          </div>
                                    
                          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                            <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </div>   
                                    <?php  
                                    break;

                        case "tambah":
                        $tgl=date('Y-m-d');
                        $data=null;
                        //untuk autonumber di nota                
                        $tampung=mysqli_query($koneksi,"SELECT COUNT(*) AS jumlah FROM h_beli");
                         $no=mysqli_fetch_array($tampung);
                        $angka=$no['jumlah']+1;
                          
                        echo "<div class='navbar-form'>
                                Kode Beli: <input type='text' id='beli' value='TRM$angka' readonly >
                                Supplier :<select id='supp' name:'supp'></select>
                                <input type='text' id='kode_supp' readonly >
                                Tgl: <input type='date' id='tanggal' value='$tgl'>
                               

                            </div>";
                            
                            echo'<legend>Transaksi Penjualan</legend>
                            <label>Nama Barang</label>
                            <select id="kode"></select>
                            <input type="text" id="nama" placeholder="Kode Barang" readonly>
                            <input type="text" id="stok" placeholder="Stok" class="span2" readonly>
                            <input type="text" id="harga" placeholder="Harga Beli" class="span1" readonly>
                            <input type="text" id="jumlah" placeholder="Jumlah Beli" class="span1">
                            <button id="tambah" class="btn btn-primary">Tambah</button>
                            
                            <span id="status"></span>
                            <table id="barang" class="table table-bordered">
                                    
                            </table>
                            <div>
                                <button id="proses" class="btn btn-success">Proses</button>

                            </div>';

                        break;   
                        }                                     

                            
                                    ?>


                                    
                                
            <!-- /.row -->
            
                        <!-- /.panel-heading -->
                        
                        <!-- /.panel-body -->
                    
                    <!-- /.panel -->
                
                <!-- /.col-lg-12 -->

              
                <!-- /.col-lg-6 -->
                
                <!-- /.col-lg-6 -->

                <!-- /.col-lg-6 -->
                
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

              

           

            </div>

           
        </div>
    </div>
</div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Flot Charts JavaScript -->
    <script src="../vendor/flot/excanvas.min.js"></script>
    <script src="../vendor/flot/jquery.flot.js"></script>
    <script src="../vendor/flot/jquery.flot.pie.js"></script>
    <script src="../vendor/flot/jquery.flot.resize.js"></script>
    <script src="../vendor/flot/jquery.flot.time.js"></script>
    <script src="../vendor/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../data/flot-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

      <script>
                //mendeksripsikan variabel yang akan digunakan
                var supp;
                var tanggal;
                var kode;
                var supplier;
                var username;
                var kode_beli;
                var nama;
                var harga;
                var jumlah;
                var stok;
                $(function(){
                    //meload file pk dengan operator ambil barang dimana nantinya
                    //isinya akan masuk di combo box
                    $("#kode").load("pk.php","op=ambilbarang");
                    $("#supp").load("pk.php","op=suppbarang");
                    
                    //meload isi tabel
                    $("#barang").load("pk.php","op=barang");
                    
                    //mengkosongkan input text dengan masing2 id berikut
                    $("#nama").val("");
                    $("#harga").val("");
                    $("#jumlah").val("");
                    $("#stok").val("");
                                
                    //jika ada perubahan di kode barang
                    $("#kode").change(function(){
                        kode=$("#kode").val();
                        
                        //tampilkan status loading dan animasinya
                        $("#status").html("loading. . .");
                        $("#loading").show();
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"proses.php",
                            data:"op=ambildata&kode="+kode,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                                $("#nama").val(data[0]);
                                $("#harga").val(data[2]);
                                $("#stok").val(data[1]);
                                $("#jumlah").focus();
                                //hilangkan status animasi dan loading
                                $("#status").html("");
                                $("#loading").hide();
                            }
                        });
                    });

                        $("#supp").change(function(){
                        supp=$("#supp").val();
                        
                        //tampilkan status loading dan animasinya
                        $("#status").html("loading. . .");
                        $("#loading").show();
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"proses.php",
                            data:"op=ambildata2&supp="+supp,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                                $("#kode_supp").val(data[0]);
                                $("#harga").val(data[3]);
                                $("#stok").val(data[1]);
                                $("#jumlah").focus();
                                //hilangkan status animasi dan loading
                                $("#status").html("");
                                $("#loading").hide();
                            }
                        });
                    });
                    
                    //jika tombol tambah di klik
                    $("#tambah").click(function(){
                        //nota=$("#nota").val();//id_beli
                        kode_beli=$("#beli").val();
                        kode=$("#nama").val();//kode barang
                        jumlah=$("#jumlah").val();
                        harga=$("#harga").val();

                        if(nama=="Nama Barang"){
                            alert("Nama Barang Harus diisi");
                            exit();
                        }else if(harga==0){
                            alert("harga Tidak Boleh Kosong");
                            $("#harga").focus();
                            exit();
                        }else if(jumlah==0){
                            alert("Jumlah beli tidak boleh 0");
                            $("#jumlah").focus();
                            exit();
                        }else if(kode_beli==0){
                            alert("kode beli tidak boleh kosong");
                            $("#kode_beli").focus();
                            exit();
                        }
                        
                        
                        
                                                
                        //$("#status").html("sedang diproses. . .");
                        //$("#loading").show();
                        
                        $.ajax({
                            url:"pk.php",
                            data:"op=tambah&kode_beli="+kode_beli+"&kode="+kode+"&jumlah="+jumlah+"&harga="+harga,
                            cache:false,
                            success:function(msg){
                                 $("#barang").load("pk.php","op=barang");
                                alert(msg);
                                exit();
                                //$("#loading").hide();
                                //$("#nama").val("");
                                //$("#kode").val("");//
                                //$("#jumlah").val("");
                                //$("#harga").val("");
                                $("#nama").load("pk.php","op=ambilbarang");
                               
                            }
                        });
                    });
                    
                    //jika tombol proses diklik
                    $("#proses").click(function(){
                        username="<?=$_SESSION['pengguna'];?>";
                        supp=$("#supp").val();
                        kode_beli=$("#beli").val();
                        tanggal=$("#tanggal").val();
                        supplier=$("#kode_supp").val();

                        

                        if(supp=="Supplier"){
                            alert("Supplier Harus diisi");
                            exit();
                        }
                        else if(supp==null){
                            alert("Supplier Harus diisi");
                            exit();
                        }
                        $.ajax({
                            url:"pk.php",
                            data:"op=proses&kode_beli="+kode_beli+"&tanggal="+tanggal+"&supplier="+supplier+"&username="+username,
                            cache:false,
                            success:function(msg){
                                alert(msg);
                               
                                
                                if(msg=='sukses'){
                                    $("#status").html('Transaksi Pembelian berhasil');
                                    alert('Transaksi Berhasil');
    
                                }   
                                window.location.reload();
                                    
                                    exit();
                               
                            }
                        })
                    })
                });
            </script>

</body>

</html>
<?php
    }else{

        header('location:\inventory\index.php');
    }
 ?>
