<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


require 'function2.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="print.css" />
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0" >

        <tr>
            <th>No.</th>
            
            <th>NIM</th>
            <th>Nama</th>
            <th>email</th>
            <th>jurusan</th>
            <th>fakultas</th>
            <th>gambar</th>
        </tr>';


    $i = 1;
    foreach($mahasiswa as $row){
        $html .= '<tr class="cetak">
            <td>'. $i++ .'</td>
            <td>'.$row["NIM"].'</td>
            <td>'.$row["Nama"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["jurusan"].'</td>
            <td>'.$row["fakultas"].'</td>
            <td><img src="gambar/'.$row["gambar"] .'" width="50"></td>
            
        </tr>';
    }


 $html .=   '</table>
</body>
</html>';



$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf', 'I');
?>