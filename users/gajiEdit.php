<?php 
if (isset($_POST['submit'])) {
    $gajiId           = $_POST['gaji_id'];
    $kode_kar           = $_POST['kode_kar'];
    $jam_lembur 	   = $_POST['jam_lembur'];
    $uang_lembur 	   = $_POST['uang_lembur'];
    $total_gaji 	   = $_POST['total_gaji'];
    
    $date = date_create($_POST['tgl_transfer']);
    $tgl_transfer	   = date_format($date, 'Y-m-d');
    $bulan_transfer	   = date_format($date, 'F');
    $jam_transfer	   = date_format($date, 'H:i');

    $query = mysqli_query($con, "UPDATE tbl_gaji 
                        SET jam_lembur='$jam_lembur', uang_lembur='$uang_lembur', total_gaji='$total_gaji', bulan_transfer='$bulan_transfer' , tgl_transfer='$tgl_transfer', jam_transfer='$jam_transfer' 
                        WHERE kode_kar='$kode_kar'");
    
    if ($query) {
        echo "<script>alert('Data Gaji Karyawan Berhasil dimasukan!'); window.location = 'layout.php?page=gList'</script>";	
    } else {
        // echo "<script>alert('Data Karyawan Gagal diubah!'); window.location = 'index.php'</script>";	
        echo "<h2><font color=red>Data Karyawan Gagal diubah!</font></h2>";
    }
}
?>

<div class="col-lg-12">
    <h1>Edit Data Gaji Karyawan <small>Admin APeK</small></h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li> Gaji</li>
        <li class="active">Edit</li>
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
            <h3 class="panel-title"><i class="fa fa-user"></i> Edit Data Karyawan </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <?php
                    $sql = mysqli_query($con, "SELECT * FROM tbl_gaji WHERE gaji_id='$_GET[id]'");
                    $data  = mysqli_fetch_array($sql);
                ?>
                <form action="" method="post">
                    <table class="table table-condensed">
                        <tr>
                            <td><label for="gaji_id">Gaji Id</label></td>
                            <td><input type="hidden" class="form-control" name="gaji_id" id="gaji_id" value="<?php echo $data['gaji_id']?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="kode_kar">Id Karyawan</label></td>
                            <td>
                                <select class="form-control" name="kode_kar" id="kode_kar" readonly>
                                    <?php 
                                        $idKar = $data['kode_kar'];
                                        $sqlKar= mysqli_query($con,"SELECT * FROM tbl_karyawan where kode_kar='$idKar'");
                                        while($dataKar=mysqli_fetch_array($sqlKar)) {
                                            echo '<option value="'.$dataKar['kode_kar'].'">'.$dataKar['nama_kar'].'</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="jam_lembur">Jam Lembur</label></td>
                            <td><input type="date" class="form-control" name="jam_lembur" id="jam_lembur" value="<?php echo date('Y-m-d', strtotime($data['jam_lembur']));?>" autofocus="on" onkeyup="hitung_gaji()" onkeydown="hitung_gaji()" onchange="hitung_gaji()" required/></td>
                        </tr>
                            <td><label for="uang_lembur">Uang Lembur</label></td>
                            <td><input type="number" step=0.01 class="form-control" name="uang_lembur" id="uang_lembur" value="<?php echo $data['uang_lembur']?>" required /></td>
                        </tr>
                        <tr>
                            <td><label for="total_gaji">Total Gaji</label></td>
                            <td><input name="total_gaji" type="text" class="form-control" id="total_gaji" value="<?php echo $data['total_gaji']?>" required/></td>
                        </tr>
                        <tr>
                            <td><label for="tgl_transfer">Tanggal dan Jam Transfer</label></td>
                            <td><input type="datetime-local" class="form-control" name="tgl_transfer" id="tgl_transfer" value="<?php echo$data['tgl_transfer'].'T'.$data['jam_transfer'] ?>"/></td>
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