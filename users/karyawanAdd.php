<?php

if (isset($_POST['submit'])) {
    $nama_kar 		    = $_POST['nama_kar'];
    $alamat_kar 	    = $_POST['alamat_kar'];
    $no_rek 	        = $_POST['no_rek'];
    $gaji_utama 	    = $_POST['gaji_utama'];
    $gol_kar	        = $_POST['gol_kar'];

    $query = mysqli_query($con, "INSERT INTO tbl_karyawan ( nama_kar, alamat, no_rek, posisi_kar, gajiBersih) 
                            VALUES (  '$nama_kar', '$alamat_kar', '$no_rek', '$gol_kar', '$gaji_utama')");

    // $kodeKar = mysqli_insert_id($con);
    // $query1 = mysqli_query($con, "INSERT INTO tbl_gaji ( kode_kar, total_gaji) 
    //                         VALUES ( '$kodeKar', '$gaji_utama')");
    if ($query) {
        echo "<script>alert('Data Karyawan Berhasil dimasukan!'); window.location = 'layout.php?page=i'</script>";	
    } else {
        // echo "<script>alert('Data Karyawan Gagal dimasukan!'); window.location = 'index.php'</script>";	
        echo "<h2><font color=red>Data Karyawan Gagal dimasukan!</font></h2>";
    }
}
?>

<div class="col-lg-12">
    <h1>Tambah Data Karyawan <small>Admin APeK</small></h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li>Karyawan</li>
        <li class="active"> Tambah</li>
    </ol>
    <table width="900">
        <tr>
            <td width="250"><div class="Tanggal"><h4><script language="JavaScript">document.write(tanggallengkap);</script></div></h4></td> 
            <td align="left" width="30"> - </td>
            <td align="left" width="620"> <h4><div id="output" class="jam" ></div></h4></td>
        </tr>
    </table>
    <br />
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Karyawan Kode auto number jadi tidak perlu di isi, abaikan saja..
    </div>
</div>

<div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> Tambah Data Karyawan </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <form action="" method="post">
                        <table class="table table-condensed">
                            <tr>
                                <td><label for="kode_kar">Kode Karyawan</label></td>
                                <td><input name="kode_kar" type="text" class="form-control" id="kode_kar" placeholder="Kode Karyawan" readonly/></td>
                            </tr>
                            <tr>
                                <td><label for="nama_kar">Nama Karyawan</label></td>
                                <td><input name="nama_kar" type="text" class="form-control" id="nama_kar" placeholder="Nama Karyawan" required/></td>
                            </tr>
                            <tr>
                                <td><label for="alamat_kar">Alamat Karyawan</label></td>
                                <td><input name="alamat_kar" type="text" class="form-control" id="alamat_kar" placeholder="Alamat Karyawan" required/></td>
                            </tr>
                            <tr>
                                <td><label for="no_rek">No Rekening</label></td>
                                <td><input name="no_rek" type="text" class="form-control" id="no_rek" placeholder="No Rekening" required/></td>
                            </tr>
                            <tr>
                                <td><label for="gaji_utama">Gaji Bersih</label></td>
                                <td><input name="gaji_utama" type="text" class="form-control" id="gaji_utama" placeholder="Gaji Bersih" required/></td>
                            </tr>
                            <tr>
                                <td><label for="gol_kar">Golongan</label></td>
                                <td><input name="gol_kar" type="text" class="form-control" id="gol_kar" placeholder="Golongan" required/></td>
                            </tr>
                            <tr>
                                <td><button class="btn btn-sm btn-primary" type="submit" name="submit">Simpan Data</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="text-right">
                    <a href="layout.php?page=i"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                    &nbsp; | &nbsp;
                    <a href="#"  data-toggle="tooltip" class="tip-bottom" data-original-title="Tooltip Dibawah">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                        
                </div>
            </div> 
        </div>
    </div>
