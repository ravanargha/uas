<?php 
session_start();
if (!isset($_SESSION['username'])){
	header('location:../index.php');	
} 
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Penggajian Karyawan">
    <meta name="author" content="Hakko Bio Richard">

    <title>Welcome to APeK (Aplikasi Penggajian Karyawan</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->

    <!-- Add custom CSS here -->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">
    
    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()",1000);  
        function waktu() {   
            var tanggal = new Date();  
            setTimeout("waktu()",1000);  
            document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();
        }
    </script>
    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;

        var popupWindow = null;
        function centeredPopup(url,winName,w,h,scroll){
            LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
            TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
            settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
            popupWindow = window.open(url,winName,settings)
        }
    </script>
    
</head>
<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">APeK (Aplikasi penggajian Karyawan)</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <!-- <li class="active"><a href="layout.php?page=i"><i class="fa fa-dashboard"></i> Data Karyawan</a></li> -->
                    <li><a href="layout.php?page=i"><i class="fa fa-dashboard"></i> Data Karyawan</a></li>
                    <li><a href="layout.php?page=gList"><i class="fa fa-bar-chart-o"></i> Data Gaji Karyawan</a></li>
                    <li><a href="layout.php?page=lList"><i class="fa fa-table"></i> Data Lembur Karyawan</a></li>
                    <li><a href="layout.php?page=dataPresensi"><i class="fa fa-edit"></i> Data Presensi Karyawan</a></li>
                    <li><a href="layout.php?page=sList"><i class="fa fa-desktop"></i> Cetak Slip Gaji Karyawan</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="layout.php?page=lGaji">Laporan Gaji Perbulan</a></li>
                            <li><a href="layout.php?page=lLembur">Laporan Lembur Perbulan</a></li>
                            <li><a href="layout.php?page=lTahunan">Laporan Tahunan</a></li>
                            <li><a href="layout.php?page=lPembayaran">Laporan Pembayaran Gaji</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hallo,
                        <?php echo $_SESSION['username']; ?>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-user"></i> Profil</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Pesan Masuk <span class="badge">7</span></a></li>
                            <li><a href="#"><i class="fa fa-gear"></i> Pengaturan </a></li>
                            <li class="divider"></li>
                            <li><a href="../logout.php" onclick="return confirm('Apakah anda akan keluar?');"><i class="fa fa-power-off"></i> Keluar APeK</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
        <!-- end Sidebar -->
        <?php
            $timeout = 10; // Set timeout minutes
            $logout_redirect_url = "../index.php"; // Set logout URL

            $timeout = $timeout * 60; // Converts minutes to seconds
            if (isset($_SESSION['start_time'])) {
                $elapsed_time = time() - $_SESSION['start_time'];
                if ($elapsed_time >= $timeout) {
                    session_destroy();
                    echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
                }
            }
            $_SESSION['start_time'] = time(); 
        ?>
        <div id="page-wrapper">
            <div class="row">
                <?php
                    if(isset($_REQUEST["page"])) {
                        switch($_REQUEST["page"]){
                            // Gaji 
                            case "gList" : include("gajiList.php");break;
                            case "gCreate" : include("gajiAdd.php");break;
                            case "gEdit" : include("gajiEdit.php");break;
                            case "gDel" : include("delete.php");break;
                            
                            //Lembur
                            case "lList" : include("lemburList.php");break;
                            
                            //Cetak Slip Gaji
                            case "sList" : include("slipGajiList.php");break;
                            case "print" : include("print.php");break;
                            // case "printSlipGaji" : include("pdf.php");break;
                            
                            //Laporan
                            case "lGaji" : include("laporanGaji.php");break;


                            ///Karyawan 
                            case "kCreate" : include("karyawanAdd.php");break;
                            case "kEdit" : include("karyawanEdit.php");break;
                            case "kDel" : include("delete.php");break;
                            
                            default: include("KaryawanList.php");break;
                        }
                    } else { 
                        include("KaryawanList.php");
                    }
                ?>
            </div><!-- /.row --> 

        </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="../assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="../assets/js/tablesorter/tables.js"></script>

</body>
</html>
