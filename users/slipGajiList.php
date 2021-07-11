<div class="col-lg-12">
    <h1> Cetak Slip Gaji Karyawan <small>Admin APeK</small></h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Dashboard</li>
        <li class="active">Lembur</li>
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
        Untuk Hitung Lembur Karyawan Silahkan Klik Nama Karyawan..
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Cetak Slip Gaji Karyawan </h3> 
        </div>
        <div class="panel-body">
            <div class="table-responsive">
            <?php
                $tampil= mysqli_query($con, "SELECT g.*, k.*
                                            FROM tbl_karyawan k
                                            Left Join tbl_gaji g on g.kode_kar = k.kode_kar");
            ?>
                <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead> 
                        <tr>
                            <th>Kode<i class="fa fa-sort"></i></th>
                            <th>Nama Karyawan<i class="fa fa-sort"></i></th>
                            <th>Posisi Karyawan <i class="fa fa-sort"></i></th>
                            <th>Gaji <i class="fa fa-sort"></i></th>
                            <th>Tanggal Lembur <i class="fa fa-sort"></i></th>
                            <th>Uang_lembur <i class="fa fa-sort"></i></th>
                            <th>Take Home Pay <i class="fa fa-sort"></i></th>
                            <th>Tanggal & Jam Transfer <i class="fa fa-sort"></i></th>
                            <th>Aksi <i class="fa fa-sort"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($data=mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td><?php echo $data['kode_kar'];?></td>
                        <td><a href="gaji.php?hal=edit&kd=<?php echo $data['kode_kar'];?>"><i class="fa fa-user"></i> <?php echo $data['nama_kar']; ?></a></td>
                        <td><?php echo $data['posisi_kar'];?></td>
                        <td>Rp.<?php echo number_format($data['gajiBersih'],2,",",".");?></td>
                        <td><?php echo date('d F Y', strtotime($data['tgl_transfer'])) ?></td>
                        <td>Rp.<?php echo number_format($data['uang_lembur'],2,",",".");?></td>
                        <td>Rp.<?php echo number_format($data['total_gaji'],2,",",".");?></td>
                        <td><?php echo date('d F Y H:i', strtotime($data['tgl_transfer'] .' '. $data['jam_transfer'])) ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="layout.php?page=print&id=<?php echo $data['gaji_id'];?>" target="_blank"><i class="fa fa-edit"></i> print</a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>