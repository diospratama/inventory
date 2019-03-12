<?php include "dbcon.php"; session_start(); 
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
                            <!-- /.nav-second-level 
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
                                    <!-- /.nav-third-level 
                                </li>
                            </ul>
                             /.nav-second-level 
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
                    <h1 class="page-header">Daftar Supplier</h1>
                </div>
                
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <button href='#' class="btn btn-success" data-target="#ModalAdd" data-toggle="modal">Tambah Supplier</button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Kode Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Alamat Supplier</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tampung=mysqli_query($koneksi,"SELECT * from supplier ");
                                    while($r1=mysqli_fetch_array($tampung)){
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo  $r1['kode_supp']; ?></td>
                                        <td><?php echo  $r1['nama_supp']; ?></td>
                                        <td><?php echo  $r1['alamat_supp']; ?></td>
                                        <td> 
                                            <a href="#" class='edit' id='<?php echo $r1['kode_supp']; ?>'>Edit</a>
                                            <a href="#" onclick="confirm_modal('proses_delete_supplier.php?&kode_supp=<?php echo  $r1['kode_supp']; ?>');">Delete</a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                                <?php } ?>
                            </table>


                        <!-- Modal Popup untuk Edit--> 
                        <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        </div> 

                        <!-- Javascript untuk popup modal Edit--> 
                        <script type="text/javascript">
                           $(document).ready(function () {
                                $(".edit").click(function(e) {
                                    var m = $(this).attr("id");
                                    $.ajax({
                                       url: "modal_edit_supplier.php",
                                       type: "GET",
                                       data : {kode_supp: m,},
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
    <!-- Modal Popup untuk dd--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Daftar Supplier</h4>
            </div>

            <div class="modal-body">
          <form action="proses_supplier_baru.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="id transaksi">Kode Supplier</label>
                  <input type="text" name="ko_sup"  class="form-control" placeholder="ko sup" required/>
                </div>

               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="id transaksi">Nama Supplier</label>
                  <input type="text" name="nma_sup"  class="form-control" placeholder="Nma sup" required/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="id transaksi">Alamat Supplier</label>
                  <input type="text" name="almt_sup"  class="form-control" placeholder="almt sup" required/>
                </div>

              <div class="modal-footer">
                  <button class="btn btn-success" type="submit" name="submit">
                      Confirm
                  </button>

                  <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                    Cancel
                  </button>
              </div>

              </form>

           

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

</body>

</html>
<?php
    }else{

        header('location:\inventory\index.php');
    }
 ?>
