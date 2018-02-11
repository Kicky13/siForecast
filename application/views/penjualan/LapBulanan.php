<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>SI Purnama Jati</title>
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()."public/"; ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()."public/"; ?>plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="<?php echo base_url()."public/"; ?>plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()."public/"; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()."public/"; ?>css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?php echo base_url()."public/"; ?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="<?php echo base_url('index.php/dashoard'); ?>">SI PURNAMA JATI</a>
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url()."public/"; ?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama; ?></div>
                    <div class="email">User</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url('index.php/user/viewprofil/' .$_SESSION['id']); ?>"><i class="material-icons">person</i>Lhat Profil</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url('index.php/login/logout'); ?>"><i class="material-icons">input</i>Keluar</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>
                    <li>
                        <a href="<?php echo base_url('index.php/dashboard/index/2'); ?>">
                            <i class="material-icons">home</i><span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/user'); ?>">
                            <i class="material-icons">perm_identity</i><span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/barang'); ?>">
                            <i class="material-icons">view_list</i><span>Barang</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('index.php/supplier'); ?>">
                            <i class="material-icons">settings_input_antenna</i><span>Rekanan</span>
                        </a>
                    </li>
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">shopping_basket</i><span>Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('index.php/barangmasuk'); ?>">Barang Masuk</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/retur'); ?>">Pengembalian</a>
                            </li>
                        </ul>
                    </li>        
                    <li  class="active">
                        <a class="menu-toggle">
                            <i class="material-icons">shopping_cart</i><span>Penjualan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('index.php/penjualan/harian'); ?>">Laporan Harian</a>
                            </li>
                            <li>
                                <a href="#'); ?>">Laporan Bulanan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/stok'); ?>">
                            <i class="material-icons">track_changes</i><span>Stok</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/peramalan'); ?>">
                            <i class="material-icons">touch_app</i><span>Peramalan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
    </section>
    <section class="content">
        <div class="container-fluid">
        
             <div class="row clearfix">
                <div class=" col-md-7 ">
                    <div class="card">
                        <div class="header">
                            <h2>Laporan Pernjualan Bulanan</h2>
                        </div>
                        <div class="body" style="overflow: auto">
                            <form action="<?=base_url('index.php/penjualan/bulanan')?>" method="get">
                                <div class="col-md-4">
                                        <select name="tahun">
                                          <option value = "">--- Pilih Tahun ---</option>
                                          <option value = "2016"> 2016 </option>
                                          <option value = "2017"> 2017 </option>                                           
                                        </select>    
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Cari</button>                               
                                </div>                                                            
                            </form>
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Bulan</th>                               
                                        <th class="col-md-2">Total Penjualan</th>
                                        <th class="col-md-1"></th>
                                    </tr>
                                    <tbody>
                                    <?php $bulan = ["Januari","Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November","Desember"]; ?>
                                    <?php foreach ($bulanan as $row){ ?>
                                        <tr>
                                            <td><?php echo $bulan[$row->bulan - 1]?></td>
                                            <td><?php echo $row->total?> Buah</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('index.php/penjualan/detailBulan/'.$row-> bulan.'/'.$row-> tahun); ?>" type="button" class="btn btn-primary waves-effect">
                                                        <i class="material-icons">search</i>
                                                    </a>
                                                </div>
                                            </td>
                                    <?php } ?> 
                                        </tr>
                                    </tbody>     
                                </thread>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-9 ">
                    <div class="card">
                        <div class="header">
                            <h2>Laporan Penjualan Bulanan</h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable"
                            style="overflow: auto">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Tahun</th>
                                        <th class="col-md-2">Bulan</th>
                                        <th class="col-md-3">Nama Barang</th>
                                        <th class="col-md-2">Total Penjualan</th>
                                         
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach ($data as $row){ ?>
                                    <tr>
                                        <td><?php echo $row->tahun?></td>                                        
                                        <td><?php echo $row->bulan?></td>
                                        <td><?php echo $row->nama_barang?></td>
                                        <td><?php echo $row->total?> Buah</td>
                                         
                                </tbody>
                                <?php } ?> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <script src="<?php echo base_url()."public/"; ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/node-waves/waves.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url()."public/"; ?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/admin.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/demo.js"></script>
</body>

</html>