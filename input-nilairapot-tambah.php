<div class="container">
<h1>Tambah Data </h1>
<form action="input-nilairapot-tambah.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input class="form-control" type="number" name="nis" placeholder="Ex. 12003102" /><br>

      <label for="nama_lengkap">Nama Lengkap :</label><br>
      <input class="form-control"type="text" name="nama" placeholder="Ex. Firdaus" /><br>

      <label for="jenis_kelamin">Jenis kelamin:</label><br>
      <input class="form-control" type="text" name="tanggal_lahir" /><br>

      <label for="kelas">kelas :</label><br>
      <input class="form-control" type="text" name="nilai" placeholder="Ex. 11 RPL 1" /><br>
      <br>
      <label for="nilai_kehadiran">Nilai kehadiran :</label><br>
      <input class="form-control" type="number" name="nilai" placeholder="Ex. 80.56" /><br>
      <br>
      <label for="nilai_tugas">Nilai tugas:</label><br>
      <input class="form-control" type="number" name="nilai" placeholder="Ex. 80.56" /><br>
      <br>
      <label for="nilai_pts">Nilai  pts:</label><br>
      <input class="form-control" type="number" name="nilai" placeholder="Ex. 80.56" /><br>
      <br>
      <label for="nilai_uas">Nilai uas :</label><br>
      <input class="form-control" type="number" name="nilai" placeholder="Ex. 80.56" /><br>
      <br>
      <input   a class=' btn btn-sm btn-success'type="submit" name="simpan" value="Simpan Data" />
      <a  a class=' btn btn-sm btn-secondary' href="input-nilairapot.php">Kembali</a>
</form>

<?php
       include ('./input-config.php');
       if($_SESSION["login"]!= TRUE){
            header('locatin:login.php');  
       }
       if($_SESSION["role"]!="admin") {

      
       echo" 
            
       <script>
       alert('anda tidak diberikan akses, kamu bukan admin');
       window.location='input-nilairapot.php';
       </script>
 ";
       }




      if( isset($_POST["simpan"]) ){
            $nis = $_POST["nis"];
            $nama = $_POST["nama lengkap"];
            $tanggal_lahir = $_POST["jenis kelamin"];
            $kelas = $_POST["kelas"];
            $nilai_kehadiran = $_POST["nilai_kehadiran"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $nilai_pts = $_POST["nilai_pts"];
            $nilai_uas = $_POST["nilai_uas"];

            // CREATE - Menambahkan Data ke Database
            $query = "
                  INSERT INTO rapot VALUES
                  ('$nis', '$nama_lengkap', '$jenis_kelamin', '$kelas','$nlai_kehadiran','$nilai_tugas','$nilai_uas','$nilai_pts');
            ";

            
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                  echo "
                        <script>
                              alert('Data berhasil ditambahkan');
                              window.location='input-nilairapot.php';
                        </script>
                  ";
            }

      }
?>