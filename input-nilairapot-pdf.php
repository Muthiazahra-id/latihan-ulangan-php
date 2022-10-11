<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
include('./input-config.php');
$no = 1;
$tabledata = "";
$data = mysqli_query($mysqli, " SELECT * FROM rapot");
while($row = mysqli_fetch_array($data)){
      $tabledata .= "
            <tr>
                  <td>".$row["nis"]."</td>
                  <td>".$row["nama_lengkap"]."</td>
                  <td>".$row["jenis_kelamin"]."</td>
                  <td>".$row["kelas"]."</td> 
                  <td>".$row["nilai_kehadiran"]."</td> 
                  <td>".$row["nilai_tugas"]."</td> 
                  <td>".$row["nilai_pts"]."</td> 
                  <td>".$row["nilai_uas"]."</td> 
            </tr>
      ";
      $no++;
}
$waktu_Cetak = date('d M Y -H :i:s');
$table = "
 <h1> Laporan Data Diri</h1>
 <h6>Waktu Cetak :$waktu_Cetak</h6>

      <table width='100%'cellpadding=5 border=1 cellspacing=0>
            <tr>
                  <th>NIS</th>
                  <th>Nama Lengkap</th>
                  <th>jenis kelamin</th>
                  <th>kelas</th>
                  <th>Nilai kehadiran</th>
                  <th>Nilai tugas</th>
                  <th>Nilai pts</th>
                  <th>Nilai uas</th>
            </tr>
            $tabledata
      </table>
";

$mpdf->WriteHTML($table);
$mpdf->Output();


?>