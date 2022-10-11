<?php
      if ( isset($_GET["nis"]) ){
            $nis = $_GET["nis"];
            $check_nis = "SELECT * FROM rapot WHERE nis = '$nis'; ";
            include('./input-config.php');
            $query = mysqli_query($mysqli, $check_nis);
            $row = mysqli_fetch_array($query);
      }
      
?>
<div class="container">
<h1>Edit Data</h1>   


<form action="input-nilairapot-edit.php" method="POST">
      <label for="nis">Nomor Induk Siswa :</label><br>
      <input  class="form-control" value="<?php echo $row["nis"]; ?>" type="number" name="nis" placeholder="Ex. 12003102" readonly/><br>

      <label for="nama_lengkap">Nama Lengkap :</label><br>
      <input  class="form-control" value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="nama_lengkap" placeholder="Ex. Firdaus" /><br>

      <label for="jenis_kelamin">jenis_kelamin:</label><br>
      <input  class="form-control"value="<?php echo $row["jenis_kelamin"]; ?>" type="text" name="jenis_kelamin" /><br>

     
      <label for="kelas">kelas:</label><br>
      <input  class="form-control"value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="Ex. 11 RPL 1" /><br>
      <br>
      <label for="nilai_kehadiran">Nilai Kehadiran :</label><br>
      <input  class="form-control"value="<?php echo $row["nilai_kehadiran"]; ?>" type="number" name="nilai_kehadiran" placeholder="Ex. 80.00" /><br>
      <br>
      <label for="nilai-tugas">Nilai Tugas :</label><br>
      <input  class="form-control"value="<?php echo $row["nilai_tugas"]; ?>" type="number" name="nilai tugas" placeholder="Ex. 80.00" /><br>
      <br>
      <label for="nilai_pts">Nilai uts :</label><br>
      <input  class="form-control"value="<?php echo $row["nilai_pts"]; ?>" type="number" name="nilai uts" placeholder="Ex. 80.00" /><br>
      <br>
      <label for="nila_uas">Nilai uas :</label><br>
      <input  class="form-control"value="<?php echo $row["nilai_uas"]; ?>" type="number" name="nilai uas" placeholder="Ex. 80.00" /><br>
      <br>
      <input a class=' btn btn-sm btn-success' type="submit" name="edit" value="Edit Data" />
      <a a class =' btn btn-sm btn-secondary' href="input-nilairapot .php">Kembali</a>
</form>


<?php
      if ( isset($_POST["edit"]) ) {
            $nis = $_POST["nis"];
            $nama_lengkap = $_POST["nama_lengkap"];
            $jenis_kelamin = $_POST["jenis_kelamin"];
            $kelas = $_POST["kelas"];
            $nilai_kehadiran = $_POST["nilai_kehadiran"];
            $nilai_tugas = $_POST["nilai_tugas"];
            $nilai_pts = $_POST["nilai_pts"];
            $nilai_uas = $_POST["nilai_uas"];

            // EDIT - Memperbaharui Data
            $query = "
                  UPDATE rapot SET nama_lengkap = '$nis', 
                  nama_lemgkap ='$namalengkap',
                  jenis_kelamin = '$jenis_kelamin'
                  kelas = '$kelas';
                  nilai_kehadiran = '$nilai_kehadiran';
                  nilai_tugas = '$nilai_kehadiran';
                  nilai_pts = '$nilai_pts';
                  nilai_uas = '$nis_uas';
            ";
            
            include ('./input-config.php');
            $update = mysqli_query($mysqli, $query);

            if($update){
                  echo "
                        <script>
                        alert('Data berhasil diperbaharui');
                        window.location='input-nilairapot.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='input-nilairapot-edit.php?nis=$nis';
                        </script>
                  ";
            }
      }
?>