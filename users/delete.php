<?php 

if(isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == 'kDel') {
        if (isset($_GET['kd'])) {
            $kode_kar = $_GET['kd'];
        } else {
            die ("Error. No Id Selected! ");
        }

        if (!empty($kode_kar) && $kode_kar != "") {
            $query = "DELETE FROM tbl_karyawan WHERE kode_kar='$kode_kar'";
            $sql = mysqli_query ($con,$query);
            if ($sql) {
                echo "<script>alert('Data Berhasil dihapus!'); window.location = 'layout.php?page=i'</script>";	
            } else {
                echo "<script>alert('Data Gagal dihapus!'); window.location = 'layout.php?page=i'</script>";	
            }
        } else {
            die ("Access Denied");
        }
    } else if ($_REQUEST["page"] == 'gDel') {
        if (isset($_GET['id'])) {
            $kode_kar = $_GET['id'];
        } else {
            die ("Error. No Id Selected! ");
        }

        if (!empty($kode_kar) && $kode_kar != "") {
            $query = "DELETE FROM tbl_karyawan WHERE kode_kar='$kode_kar'";
            $sql = mysqli_query ($con,$query);
            if ($sql) {
                echo "<script>alert('Data Berhasil dihapus!'); window.location = 'layout.php?page=i'</script>";	
            } else {
                echo "<script>alert('Data Gagal dihapus!'); window.location = 'layout.php?page=i'</script>";	
            }
        } else {
            die ("Access Denied");
        }
    }
} else { 
    die ("Access Denied");
    echo "<script> window.location = 'layout.php?page=i'</script>";	
}