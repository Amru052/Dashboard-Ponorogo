<html>
<head>
  <meta charset="utf-8">
  <title>RAB</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<?php

$data2 = array("nama_sub"=>"Sub 1",
               "data_keg"=>[array("id_keg"=>"","nama_keg"=>"kegiatan 1","tanggal"=>"tanggal 1","jumlah"=>"jumlah 1"),
                            array("id_keg"=>"","nama_keg"=>"kegiatan 2","tanggal"=>"tanggal 2","jumlah"=>"jumlah 2"),
                            array("id_keg"=>"","nama_keg"=>"kegiatan 3","tanggal"=>"tanggal 3","jumlah"=>"jumlah 3")
                           ]
            );
$id_sub = $_REQUEST['id'];
?>
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
          <h1>Dashboard Ponorogo</h1>
        </div>
        <div class="formbg2-outer">
          <div class="formbg2">
            <div class="formbg2-inner padding-horizontal--48">
              <span class="padding-bottom--15">BIDANG RAB</span>
              <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Sub-bidang</th>
                    <th scope="col">Kegiatan</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      $temp1 = 1;
                      foreach ($data2['data_keg'] as $kegiatan1) {
                        $temp2 = count($kegiatan1);
                        if ($temp1 == 1) {
                          $temp1 = $temp1+1;
                          echo "<tr>";
                            echo "<td rowspan=$temp2 scope='row'>" . $data2['nama_sub'] . "</td>";
                            echo "<td scope='row'>" . $kegiatan1['nama_keg'] . "</td>";
                            echo "<td scope='row'>" . $kegiatan1['tanggal'] . "</td>";
                            echo "<td scope='row'>" . $kegiatan1['jumlah'] . "</td>";
                            echo "<td scope='row'><a href='detail.php?id={$kegiatan1['id_keg']}'>[Detail]</a></td>";
                          echo "</tr>";
                        } else {
                            echo "<tr>";
                              echo "<td scope='row'>" . $kegiatan1['nama_keg'] . "</td>";
                              echo "<td scope='row'>" . $kegiatan1['tanggal'] . "</td>";
                              echo "<td scope='row'>" . $kegiatan1['jumlah'] . "</td>";
                              echo "<td scope='row'><a href='table2.php?id={$kegiatan1['id_keg']}'>[Detail]</a></td>";
                            echo "</tr>";
                        }
                      };
                    ?>
                </tbody>
                </table>
                <div class="field padding-bottom--24" style="width: 100px;">
                  <input class="btn btn-primary" type="submit" name="Back" value="Back" onclick="parent.location='table1.php'">
                </div>
            </div>
          </div>
          <div class="footer-link padding-top--24">
            <span></span>
            <div class="listing padding-top--24 padding-bottom--24 flex-flex center-center">
              <span><a href="#">Departemen Statistika Bisnis</a></span>
              <span><a href="#">Fakultas Vokasi</a></span>
              <span><a href="#">Institut Teknologi Sepuluh Nopember</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>