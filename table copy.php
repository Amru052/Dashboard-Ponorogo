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
        <div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
          <h1>Survey Gejala COVID-19</h1>
        </div>
        <div class="formbg2-outer">
          <div class="formbg2">
            <div class="formbg2-inner padding-horizontal--48">
              <span class="padding-bottom--15">Database Pasien</span>
              <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Komorbid</th>
                    <th scope="col">Gejala Umum</th>
                    <th scope="col">Gejala Tidak Umum</th>
                    <th scope="col">Gejala Serius</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <?php
                include 'db.php';
                global $conn;

                $sql= "SELECT id, nama_lengkap, umur,komorbid, gejala_umum, gejala_tidak_umum, gejala_serius FROM tpasien";
                $result=pg_query($sql);

                while ($row = pg_fetch_assoc($result)){
                    $id= $row ["id"];
                    $nama_lengkap= $row ["nama_lengkap"];
                    $umur= $row ["umur"];
                    $komorbid= $row ["komorbid"];
                    $gejala_umum= $row ["gejala_umum"];
                    $gejala_tidak_umum= $row ["gejala_tidak_umum"];
                    $gejala_serius= $row ["komorbid"];
                    if (substr_count($komorbid,",")>0){
                        $jumlah_komorbid = substr_count($komorbid,",")+1;}
                    if (substr_count($gejala_umum,",")>0){
                        $jumlah_gejala_umum = substr_count($gejala_umum,",")+1;}
                    if (substr_count($gejala_tidak_umum,",")>0){
                        $jumlah_gejala_tidak_umum = substr_count($gejala_tidak_umum,",")+1;}
                    if (substr_count($gejala_serius,",")>0){
                        $jumlah_jumlah_gejala_serius = substr_count($gejala_serius,",")+1;}
                    else{
                        $jumlah_komorbid=0;
                        $jumlah_gejala_umum=0;
                        $jumlah_gejala_tidak_umum=0;
                        $jumlah_jumlah_gejala_serius=0;
                    }
                    echo
                    "<tbody>
                    <tr>
                        <td scope='row'>$id</td>
                        <td scope='col'>$nama_lengkap</td>
                        <td scope='col'>$umur</td>
                        <td scope='col'>$jumlah_komorbid</td>
                        <td scope='col'>$jumlah_gejala_umum</td>
                        <td scope='col'>$jumlah_gejala_tidak_umum</td>
                        <td scope='col'>$jumlah_gejala_tidak_umum</td>
                        <td><a href= 'detail.php?id=$id'> [Detail] </a></td>
                    </tr>";
                }
                echo "</tbody>
                </table>
                "

                ?>
                <div class="field padding-bottom--24" style="width: 100px;">
                  <input class="btn btn-primary" type="submit" name="Back" value="Back" onclick="parent.location='index.php'">
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