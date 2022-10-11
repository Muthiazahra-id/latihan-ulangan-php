<div class="container">
<h1>Tambah Data</h1>
<form action="input-nilairapot-tambah.php" method="POST">
    <label for="nis">Nomor Induk Siswa:</label>
    <input class="form-control" type="number" name="nis" placeholder="Ex. 12100848" /><br>

    <label for="nama_lengkap">Nama Lengkap :</label>
    <input class="form-control" type="text" name="nama_lengkap" placeholder="Ex. Mutya" /><br>

    <label for="jenis_kelamin">Jenis Kelamin :</label>
    <input class="form-control" type="text" name="jenis_kelamin" placeholder="Ex. L/P"/><br>

    <label for="kelas">Kelas :</label>
    <input class="form-control" type="text" name="kelas" placeholder="Ex. XI RPL 1" /><br>

    <label for="nilai_kehadiran">Nilai Kehadiran :</label>
    <input class="form-control" type="text" name="nilai_kehadiran" placeholder="Ex. 90" /><br>

    <label for="nilai_tugas">Nilai Tugas :</label>
    <input class="form-control" type="text" name="nilai_tugas" placeholder="Ex. 90" /><br>

    <label for="nilai_pts">Nilai PTS :</label>
    <input class="form-control" type="text" name="nilai_pts" placeholder="Ex. 90" /><br>

    <label for="nilai_uas">Nilai UAS :</label>
    <input class="form-control" type="text" name="nilai_uas" placeholder="Ex. 90" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-nilairapot.php">Kembali</a>
</form>    
</div>

<?php 
     include('./input-config.php');
     if ( $_SESSION["login"] != TRUE) {
         header('location:login.php');
     }
      if ( $_SESSION["role"] != "admin" ) {
        echo "
        <script>
            alert('Akses tidak diberikan, Kamu Bukan Admin');
            window.location='input-nilairapot.php';
        </script>
        ";
      }

    if( isset($_POST["simpan"]) ){
        $nis = $_POST["nis"];
        $nama_lengkap = $_POST["nama_lengkap"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pts"];
        $nilai_uas = $_POST["nilai_uas"];

        //CREATE - Menammbahkan Data ke Database
        $query = "
            INSERT INTO rapot VALUES
            ('$nis','$nama_lengkap','$jenis_kelamin','$kelas',' $nilai_kehadiran','$nilai_tugas',' $nilai_pts',' $nilai_uas');
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