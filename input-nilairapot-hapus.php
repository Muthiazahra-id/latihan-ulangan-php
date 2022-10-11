<?php
      include ('./input-config.php');
      if( $_SESSION["login"] !=TRUE) {
            header('location:login.php');
      }
      if( $_SESSION["role"] !="admin") {
            echo "
                  <script>
                        alert('Akses tidak diberikan, kamu bukan admin');
                        window.location='input-nilairapot.php';
                  </script>
            ";
      }

      if ( isset($_GET["nis"]) && $_SESSION["role"] =="admin" ){
            $nis = $_GET["nis"];

            $query = "
                  DELETE FROM rapot
                  WHERE nis = '$nis';
            ";
            
            $delete = mysqli_query($mysqli, $query);

            if($delete){
                  echo "
                        <script>
                        alert('Data berhasil dihapus');
                        window.location='input-nilairapot.php';
                        </script>
                  ";
            }else{
                  echo "
                        <script>
                        alert('Data gagal');
                        window.location='input-nilairapot.php';
                        </script>
                  ";
            }
      }
?>