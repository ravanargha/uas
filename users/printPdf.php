<?php
require_once("../assets/TCPDF/tcpdf.php");
include('../koneksi.php');

if(isset($_REQUEST["id"])) {
	
	$pdf = new TCPDF();

	// set document information
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor("my name");
	$pdf->SetTitle("my doc");
	$pdf->SetSubject("x");
	$pdf->SetKeywords("a, b, c");


	// set default header data
	// $pic = "/gfx/header.png";
	// $pdf->SetHeaderData(realpath($pic), "25", "Title");
	$pdf->SetHeaderData('', '', 'Hello ','Gudmrng', "25", "Title");

	// set header and footer fonts
	$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	//set margins
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	//set auto page breaks
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

	//set image scale factor
	$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

	// //set some language-dependent strings
	// $pdf->setLanguageArray($l);

	// //initialize document
	// $pdf->AliasNbPages();

	// add a page
	$pdf->AddPage();
	$tbl_header = '<h2 style="color:blue;text-align: center;font-size: 14px;">Headding</h2></br>';

	$id = $_REQUEST['id'];
	$sql="select g.*,k.* from tbl_gaji g left join tbl_karyawan k on g.kode_kar = k.kode_kar where g.gaji_id ='$id'";
	$hasil = mysqli_query($con, $sql);
	$data  = mysqli_fetch_array($sql);
	$kodeKar = $data["kode_kar"];
	$namaKar = $data["nama_kar"];
	$posisiKar = $data["posisi_kar"];
	$gajiKar = 'Rp.'.number_format($data['gajiBersih'],2,",",".");
	$tglTF = date('d F Y', strtotime($data['tgl_transfer']));
	$uangLembur = 'Rp.'.number_format($data['uang_lembur'],2,",",".");
	$totGaji = 'Rp.'.number_format($data['total_gaji'],2,",",".");
	$dateTimeTF = date('d F Y H:i', strtotime($data['tgl_transfer'] .' '. $data['jam_transfer']));

	$html = '<table width="530" cellspacing="0" cellpadding="3" border="1">
				<thead> 
					<tr>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Kode</i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Nama Karyawan</i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Posisi Karyawan </i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Gaji </i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Tanggal Lembur </i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Uang_lembur </i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Take Home Pay </i></th>
						<th style="text-align: center;font-size: 10px;font-weight: bold;width:100px;">Tanggal & Jam Transfer </i></th>
					</tr>
				</thead>
				<tbody>';
	$html .= '<tr>
				<td>'.$kodeKar .'</td>
				<td>'.$namaKar .'</td>
				<td>'.$posisiKar .'</td>
				<td>'.$gajiKar .'</td>
				<td>'.$tglTF .'</td>
				<td>'.$uangLembur .'</td>
				<td>'.$totGaji .'</td>
				<td>'.$dateTimeTF .'</td>
			</tr>';
	$html .=  '</tbody></table>';

	$pdf->writeHTML($tbl_header . $html, true, false, false, false, '');
	//$pdf->writeHTML($html, true, 0);
	//$pdf->writeHTML($html, true, 0);


	$pdf->Output('test_1.pdf','I');

}
?>