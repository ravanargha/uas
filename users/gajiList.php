<div class="col-lg-12">
    <h1> Data Gaji Karyawan <small>Admin APeK</small></h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Halaman Utama </li>
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
        Selamat Datang Di Halaman Admin APeK.. Untuk Hitung Lembur Karyawan Silahkan Klik Nama Karyawan..
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Data Gaji Karyawan </h3> 
        </div>
        <div class="panel-body">
            <div class="table-responsive">
            <?php
                $tampil= mysqli_query($con, "SELECT g.*, k.nama_kar, k.no_rek, k.gajiBersih
                                            FROM tbl_gaji g
                                            Left Join tbl_karyawan k on g.kode_kar = k.kode_kar");
            ?>
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead> 
                        <tr>
                            <th>Kode<i class="fa fa-sort"></i></th>
                            <th>Nama Karyawan<i class="fa fa-sort"></i></th>
                            <th>No Rekening <i class="fa fa-sort"></i></th>
                            <th>Gaji <i class="fa fa-sort"></i></th>
                            <th>Uang_lembur <i class="fa fa-sort"></i></th>
                            <th>Take Home Pay <i class="fa fa-sort"></i></th>
                            <th>Tanggal Transfer <i class="fa fa-sort"></i></th>
                            <th>Jam Transfer <i class="fa fa-sort"></i></th>
                            <th>Aksi <i class="fa fa-sort"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($data=mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $data['kode_kar'];?></td>
                        <td><a href="gaji.php?hal=edit&kd=<?php echo $data['kode_kar'];?>"><i class="fa fa-user"></i> <?php echo $data['nama_kar']; ?></a></td>
                        <td><?php echo $data['no_rek']; ?></td>
                        <td>Rp.<?php echo number_format($data['gajiBersih'],2,",",".");?></td>
                        <td>Rp.<?php echo number_format($data['uang_lembur'],2,",",".");?></td>
                        <td>Rp.<?php echo number_format($data['total_gaji'],2,",",".");?></td>
                        <td><?php echo $data['tgl_transfer'];?></td>
                        <td><?php echo $data['jam_transfer']; ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="layout.php?page=gEdit&id=<?php echo $data['gaji_id'];?>"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger" href="layout.php?page=gDel&id=<?php echo $data['gaji_id'];?>"><i class="fa fa-wrench"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="text-right">
                <a href="layout.php?page=gCreate" class="btn btn-sm btn-warning">Tambah Data Gaji Karyawan <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div> 
    </div>
</div>