<html>
 <head>
 <title>Pemesanan Tiket Pesawat</title> <!--memberikan judul HTML-->
 </head>
 <body>
 <h1 align = "center">PT. Cat Air</h1>
 
 <table align = "center", border = "2">
 <tr>
 <td align = 'center'><a href='tambah-tiket.php?id_tiket=$id_tiket'>Tambah Pemesan</a></td> <!--memberikan link untuk menambah pemesan tiket-->
 </tr>
 </table>
 
</html>
 <script language="javascript" type="text/javascript"> <!--Script javascript-->
 function deletePesawat(id_tiket){ <!--fungsi untuk menghapus kolom pemesan tiket-->
 if (confirm('Are you sure to delete this Ticket?')) { window.location.href = '?delete&id_tiket=' + id_tiket;
 } <!--mengkonfirmasikan apakah yakin mau hapus atau tidak-->
 }
 </script>
 
<?php
 
 include("koneksi.php"); //pemanggilan file "koneksi.php"
 
 if(isset($_GET['delete']) && isset($_GET['id_tiket'])){ // fungsi isset untuk menyatakan variable sudah diset atau tidak
 $sqldelete = 'DELETE FROM Pesawat WHERE id_tiket="'.$_GET['id_tiket'].'"';
 mysql_query($sqldelete) or die('Delete Pesawat failed. ' . mysql_error()); // pemberitahuan bahwa delete gagal
 echo "<script>window.location.href='indek.php';</script>";
 }
 
 $selectPesawat = 'select *from Pesawat order by id_tiket asc'; // variabel untuk memanggil query select ke database
 $resultselectPesawat = mysql_query($selectPesawat) or die ('error, load data Pesawat failed.'.mysql_error()); // pemberitahuan error bahwa gagal membuka data
 
 if(mysql_num_rows($resultselectPesawat)==0){echo "Data tidak tersedia";} // pengecekan ketersediaan data
 
 else {
 echo "<table width='75%' align = 'center' border = '3'>
 <br></br>
 <td height = '40' colspan = '10' align = 'center' bgcolor = 'DEB887'><font size = '5'><strong>Daftar Pemesanan Tiket Pesawat</strong></td>
 <tr height = '30' >
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Nomor Tiket</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Nama Pemesan</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Alamat Pemesan</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Tanggal Pesan</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Jenis Tiket</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Kota Tujuan</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Tanggal Berangkat</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center'>Waktu</td>
 <td align = 'center' bgcolor = 'FAEBD7'= 'center' colspan = '2'>Action</td>
 </tr>";
 while($row = mysql_fetch_array($resultselectPesawat)){ // mysql_fetch_array : fungsi untuk menyimpan data menjadi array
 extract($row); // extract() : mengkonversi nama array menjadi variabel
 echo
 "<tr>
 <td align = 'center' bgcolor = 'FF7F50'>".$id_tiket."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$nama_pemesan."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$alamat_pemesan."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$tanggal_pesan."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$jenis_pesawat."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$tujuan."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$tanggal_operasi."</td>
 <td align = 'center' bgcolor = 'FF7F50'>".$waktu_operasi."</td>
 <td align = 'center' bgcolor = 'FF7F50'><a href='edit-tiket.php?id_tiket=$id_tiket'>Update</a></td> <!-- memberikan link untuk mengedit data tiket-->
 <td align = 'center' bgcolor = 'FF7F50'><a href=javascript:deletePesawat($id_tiket)>Delete</a></td> <!-- memberikan link untuk menghapus data tiket-->
 </tr>";
 }
 echo "</table>";
 }
?>
 </body>
</html>