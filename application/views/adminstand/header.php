<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kasir TeaBreak</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="apple-touch-icon" href=<?php echo base_url("apple-icon.png")?>>
    <link rel="shortcut icon" href=<?php echo base_url("assets/logo.ico")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/normalize.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/navbar.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/bootstrap.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/font-awesome.min.css")?>>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/themify-icons.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/flag-icon.min.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/cs-skin-elastic.css")?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/datatable/datatables.css") ?>>
    <link rel="stylesheet" href=<?php echo base_url("assets/css/calculator.css") ?>>
    <!-- <link rel="stylesheet" href=<echo base_url("assets/css/bootstrap-select.less")?>> -->
    <link rel="stylesheet" href=<?php echo base_url("assets/scss/style.css")?>>
    <link href=<?php echo base_url("assets/css/lib/vector-map/jqvmap.min.css")?> rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src=<echo base_url("https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js")?>></script> -->

</head>
<script type="text/javascript">
    function sinkronallnota() {
        alert('sinkron');
    }
</script>
<style type="text/css">
.red{
    color: red !important;
}
.green{
    color: green !important;
}
</style>
<body>
    <div class="header" id="header">
        <div class="col-md-7 col-sm-12">
            <div class="header-left" >
                <img class="navbar-brand" align="left" src=<?php echo base_url("images/logo.png")?>>
                <div class="dropdown active">
                    <a href=<?php echo base_url("")?> style="color: black;">KASIR</a>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">STOK <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href=<?php echo base_url("voidnota")?>>Void Nota</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">KAS <i class="fa fa-caret-down"></i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href="#">Menu 1</a>
                        <a class="nav-link" href="#">Menu 2</a>
                    </div>
                </div>

                
            </div>
        </div>
        <div class="col-md-5">
            <div class="header-right">

                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rio Christian</i></a>
                    <div class="dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-cog"></i> Ganti Password</a>
                        <a class="nav-link" href="logout"><i class="fa fa-power-off"></i> Logout</a>
                    </div>
                </div>
                <button onclick="sinkronallnota()" class="dropdown float-right active">
                    <a style="color: white;"><i class="fa fa-refresh"></i> SINKRONISASI NOTA</a>
                </button>
            </div>
        </div>
    </div>