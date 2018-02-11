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
                <a class="navbar-brand" href="#">SI PURNAMA JATI</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="menu-info">
                                                <h4><?php foreach ($notif as $item): echo $item['notif']; ?>
                                                    <?php endforeach ?></h4>   
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                    <div class="email">Administrator</div>
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
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>
                    <li class="active">
                        <a href="#">
                            <i class="material-icons">home</i><span>Dashboard</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?php echo base_url('index.php/user'); ?>">
                            <i class="material-icons">perm_identity</i><span>User</span>
                        </a>
                    </li>
                    <li >
                        <a href="<?php echo base_url('index.php/barang'); ?>">
                            <i class="material-icons">view_list</i><span>Barang</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo base_url('index.php/supplier'); ?>">
                            <i class="material-icons">settings_input_antenna</i><span>Rekanan</span>
                        </a>
                    </li>
                    <li >
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
                    <li>
                        <a class="menu-toggle">
                            <i class="material-icons">shopping_cart</i><span>Penjualan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url('index.php/penjualan/harian'); ?>">Laporan Harian</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/penjualan/bulanan'); ?>">Laporan Bulanan</a>
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
                <div class="col-md-11">
                    <div class="card">
                        <div class="body">
                            <form action="<?=base_url('index.php/dashboard/set')?>" method="post">                                
                                <label for="nama_supplier">Pilih Barang : </label>                               
                                    <div>
                                        <select name="id_barang" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                         <?php foreach ($barang as $row){ ?>
                                          <option value = "<?php echo base_url('index.php/dashboard/index/'.$row->id_barang); ?>"> <?php echo $row->nama_barang; ?></option>
                                        <?php } ?>                              
                                        </select>                                   
                                    </div>                                                          
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Grafik Penjualan <?php foreach ($namabarang as $item): echo $item['nama_barang']; ?>
                            <?php endforeach ?></h2>                            
                        </div>
                        <div class="container">
                            <div><canvas id="canvas"></canvas> </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </section>


<script src="<?php echo base_url()."public/"; ?>js/Chart.js"></script>
   
<script type="text/javascript">
          var ctx = document.getElementById("canvas");
              var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: ["<?php echo $grafik['bulan'][$grafik['blnAda'][11]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][10]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][9]-1]; ?>",
                   "<?php echo $grafik['bulan'][$grafik['blnAda'][8]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][7]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][6]-1]; ?>",
                    "<?php echo $grafik['bulan'][$grafik['blnAda'][5]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][4]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][3]-1]; ?>",
                    "<?php echo $grafik['bulan'][$grafik['blnAda'][2]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][1]-1]; ?>", "<?php echo $grafik['bulan'][$grafik['blnAda'][0]-1]; ?>"],
                  datasets: [{
                    label: "Penjualan",
                    backgroundColor: "rgba(38, 185, 154, 0.31)",
                    borderColor: "rgba(38, 185, 155, 0.7)",
                    pointBorderColor: "rgba(38, 185, 154, 0.7)",
                    pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    pointBorderWidth: 1,
                    data: [<?php echo $grafik['nilai'][11]; ?>, <?php echo $grafik['nilai'][10]; ?>, <?php echo $grafik['nilai'][9]; ?>, <?php echo $grafik['nilai'][8]; ?>, 
                    <?php echo $grafik['nilai'][7]; ?>, <?php echo $grafik['nilai'][6]; ?>, <?php echo $grafik['nilai'][5]; ?>, <?php echo $grafik['nilai'][4]; ?>, 
                    <?php echo $grafik['nilai'][3]; ?>, <?php echo $grafik['nilai'][2]; ?>, <?php echo $grafik['nilai'][1]; ?>, <?php echo $grafik['nilai'][0]; ?>]

                  }, {
                    label: "Ramalan",
                    backgroundColor: "rgba(3, 88, 106, 0.3)",
                    borderColor: "rgba(3, 88, 106, 0.70)",
                    pointBorderColor: "rgba(3, 88, 106, 0.70)",
                    pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(151,187,205,1)",
                    pointBorderWidth: 1,
                    data: [<?php echo $grafik['ramal'][11]; ?>, <?php echo $grafik['ramal'][10]; ?>, <?php echo $grafik['ramal'][9]; ?>, <?php echo $grafik['ramal'][8]; ?>, 
                    <?php echo $grafik['ramal'][7]; ?>, <?php echo $grafik['ramal'][6]; ?>, <?php echo $grafik['ramal'][5]; ?>, <?php echo $grafik['ramal'][4]; ?>, 
                    <?php echo $grafik['ramal'][3]; ?>, <?php echo $grafik['ramal'][2]; ?>, <?php echo $grafik['ramal'][1]; ?>, <?php echo $grafik['ramal'][0]; ?>]

                  }]
                }
              });
            
</script>
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
    <script src="<?php echo base_url()."public/"; ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/admin.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/advanced-form-elements.js"></script>
    <script src="<?php echo base_url()."public/"; ?>js/demo.js"></script>
  
</body>
</html>