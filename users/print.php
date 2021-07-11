<?php 
$id = $_REQUEST['id'];
$sql="select g.*,k.* from tbl_gaji g left join tbl_karyawan k on g.kode_kar = k.kode_kar where g.gaji_id ='$id'";
$hasil = mysqli_query($con, $sql);
$data  = mysqli_fetch_array($hasil);
$kodeKar = $data["kode_kar"];
$namaKar = $data["nama_kar"];
$posisiKar = $data["posisi_kar"];
$gajiKar = 'Rp.'.number_format($data['gajiBersih'],2,",",".");
$tglLembur = date('d F Y', strtotime($data['tgl_transfer']));
$uangLembur = 'Rp.'.number_format($data['uang_lembur'],2,",",".");
$totGaji = 'Rp.'.number_format($data['total_gaji'],2,",",".");
$dateTimeTF = date('d F Y H:i', strtotime($data['tgl_transfer'] .' '. $data['jam_transfer']));
?>

<div class="col-lg-12">
    <center><h1> Slip Gaji Karyawan <small>Admin APeK</small></h1></center>
</div>
<hr>
<div class="col-lg-12">
    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-md-12">
                <table>
                    <tbody>
                        <tr>
                            <td>Kode </td>
                            <td>: <?php echo $kodeKar ?></td>
                            <td  style="width: 15%;"></td>
                            <td>Posisi Karyawan </td>
                            <td> : <?php echo $posisiKar ?></td>
                        </tr>
                        <tr>
                            <td>Nama Karyawan</td>
                            <td> : <?php echo $namaKar ?></td>
                            <td  style="width: 15%;"></td>
                            <td>Tanggal Cetak </td>
                            <td> : <?php echo date('d-m-Y') ?></td>
                        </tr>
                        <tr>
                            <td>Perusahaan</td>
                            <td> : Aplikasi Penggajian Karyawan</td>
                            <td  style="width: 15%;"></td>
                            <td>Mata Uang </td>
                            <td> : IDR </td>
                        </tr>
                        <tr>
                            <td>Tanggal & Jam Transfer</td>
                            <td> : <?php echo $dateTimeTF ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>            
            <hr>
            <div class="col-md-12">
                <table>
                    <tbody>
                        <tr> <td>Penghasilan : </td></tr>
                        <tr>
                            <td>Gaji </td>
                            <td  style="width: 30%;"></td>
                            <td> <?php echo $gajiKar ?></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr> <td>Lembur :</td></tr>
                        <tr>
                            <td>Tanggal Lembur </td>
                            <td  style="width: 30%;"></td>
                            <td> <?php echo $tglLembur ?></td>
                        </tr>
                        <tr>
                            <td>Uang lembur </td>
                            <td  style="width: 30%;"></td>
                            <td> <?php echo $totGaji ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</div>
<script>
    window.print();
</script>