<html>
<head>
  <meta charset="utf-8">
  <title>Survey COVID-19</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <div class="login-root">
    <div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
      <div class="loginbackground box-background--white padding-top--64">
        <div class="loginbackground-gridContainer">
          <div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
            <div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
            </div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
            <div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
            <div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
            <div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
            <div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
            <div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
            <div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
            <div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
          </div>
          <div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
            <div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
          </div>
        </div>
      </div>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
        <div class="formbg-outer padding-top--128">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
                <?php
                    include "db.php";
                    if (isset($_POST["submit"])){
                        $nama_lengkap = $_POST["nama_lengkap"];
                        $domisili = $_POST["domisili"];
                        $umur = $_POST["umur"];
                        $jenis_kelamin = $_POST["jenis_kelamin"];
                        $tanggal_lahir = $_POST["tanggal_lahir"];
                        $tanggal_terjangkit = $_POST["tanggal_terjangkit"];
                        $tanggal_sembuh = $_POST["tanggal_sembuh"];
                        $protokol = $_POST["protokol"];
                        $masker = $_POST["masker"];
                        $cuci_tangan = $_POST["cuci_tangan"];
                        $komorbid = $_POST["komorbid"];
                        $gejala_umum = $_POST["gejala_umum"];
                        $gejala_tidak_umum = $_POST["gejala_tidak_umum"];
                        $gejala_serius = $_POST["gejala_serius"];
                        $range_gejala = $_POST["range_gejala"];
                        $kebiasaan = $_POST["kebiasaan"];
                        ?>
                        <div class="box-root padding-top-bottom--48 flex-flex flex-justifyContent--center">
                            <h1>Terima Kasih <?php echo $nama_lengkap[0] ?></h1>
                        </div>
                        <?php
                        $nl=implode(" ",$nama_lengkap);
                        $k=implode(", ",$komorbid);
                        $u=implode(", ",$gejala_umum);
                        $tu=implode(", ",$gejala_tidak_umum);
                        $s=implode(", ",$gejala_serius);
                        $kb=implode(", ",$kebiasaan);

                        $sql = "INSERT INTO tpasien (nama_lengkap, domisili, umur, jenis_kelamin,
                                                    tanggal_lahir, tanggal_terjangkit, tanggal_sembuh, protokol,
                                                    masker, cuci_tangan, komorbid, gejala_umum,
                                                    gejala_tidak_umum, gejala_serius, range_gejala, kebiasaan)
                                VALUES ('$nl', '$domisili', '$umur', '$jenis_kelamin',
                                        '$tanggal_lahir', '$tanggal_terjangkit', '$tanggal_sembuh', '$protokol',
                                        '$masker', '$cuci_tangan', '$k', '$u',
                                        '$tu', '$s', '$range_gejala', '$kb')";
                        $result = mysqli_query($conn, $sql);
                        if ($result == true) {
                        } else {
                            echo "<script>alert('Data Tidak Berhasil Ditambahkan');window.location='index.php';</script>";
                        }
                        
                    }
               ?>
                <div class="box-root padding-top-bottom--48 flex-flex flex-justifyContent--center">
                    <div class="field padding-bottom--24" style="width: 500px;">
                        <input class="btn btn-primary" type="submit" name="View Database" value="View Database" onclick="parent.location='table.php'">
                    </div> 
                </div>
            </div> 

          </div>
          <div class="footer-link padding-top--24">
            <span></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">Amru Rasyid Hammami</a></span>
              <span><a href="#">2043211052</a></span>
              <span><a href="#">MBD (A)</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>