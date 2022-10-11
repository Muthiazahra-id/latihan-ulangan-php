<?php
    if ( isset($_GET["nis"]) ){
        $nis = $_GET["nis"];
        $check_nis = "SELECT * FROM rapot WHERE nis = '$nis';";
        include('./input-config.php');
        $querry = mysqli_query($mysqli, $check_nis);
        $row = mysqli_fetch_array($querry);
    }
?>
<div class="container">
<h1>Edit Data</h1>
<form action="input-nilairapot-edit.php" method="POST">
    <label for="nis"> Nomor Induk siswa :</label>
    <input class="form-control" value="<?php echo $row["nis"]; ?>" readonly type="number" name="nis" placeholder="Ex. 12100848" /><br>

    <label for="nama_lengkap"> Nama Lengkap :</label>
    <input class="form-control" value="<?php echo $row["nama_lengkap"]; ?>" type="text" name="namalengkap" placeholder="Ex. Yufa" /><br>

    <label for="jenis_kelamin"> Jenis Kelamin :</label>
    <input class="form-control" value="<?php echo $row["jenis_kelamin"]; ?>" type="text" name="jenis_kelamin" /><br>

    <label for="kelas"> Kelas :</label>
    <input class="form-control" value="<?php echo $row["kelas"]; ?>" type="text" name="kelas" placeholder="Ex. XI RPL 1" /><br>
   
    <label for="nilai_kehadiran"> Nilai Kehadiran :</label>
    <input class="form-control" value="<?php echo $row["nilai_kehadiran"]; ?>"  type="number" name="nilai_kehadiran" placeholder="Ex. 80" /><br>
   
    <label for="nilai_tugas"> Nilai Tugas :</label>
    <input class="form-control" value="<?php echo $row["nilai_tugas"]; ?>"  type="number" name="nilai_tugas" placeholder="Ex. 80" /><br>
  
    <label for="nilai_pts"> Nilai PTS :</label>
    <input class="form-control" value="<?php echo $row["nilai_pts"]; ?>" type="number" name="nilai_pts" placeholder="Ex. 90" /><br>
   
    <label for="nilai_uas"> Nilai UAS :</label>
   <input class="form-control" value="<?php echo $row["nilai_uas"]; ?>" type="number" name="nilai_uas" placeholder="Ex. 80" /><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" />
    <a class='btn btn-sm btn-secondary' href="input-nilairapot.php">kembali</a>
</form>
<?php
    if ( isset($_POST["simpan"])) {
        $nis = $_POST["nis"];
        $namalengkap = $_POST["namalengkap"];
        $jenis_kelamin = $_POST["jenis_kelamin"];
        $kelas = $_POST["kelas"];
        $nilai_kehadiran = $_POST["nilai_kehadiran"];
        $nilai_tugas = $_POST["nilai_tugas"];
        $nilai_pts = $_POST["nilai_pts"];
        $nilai_uas = $_POST["nilai_uas"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE rapot SET namalengkap = '$namalengkap',
            jenis_kelamin= '$jenis_kelamin',
            kelas = '$kelas',
            nilai_kehadiran = '$nilai_kehadiran',
            nilai_tugas = '$nilai_tugas',
            nilai_pts = '$nilai_pts',
            nilai_uas = '$nilai_uas'
            WHERE nis = '$nis';
        ";
        include('./header.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='input-nilairapot.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='input-nilairapot-edit.php?nis=$nis';
            </script>
            ";
        }
    }
?>