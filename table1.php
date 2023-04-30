<html>
<head>
  <meta charset="utf-8">
  <title>RAB</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<?php

include 'db.php';
$sql = "SELECT b.id_bidang,b.nama_bidang, s.id_sub, s.nama_sub,sum(r.volume*r.harga) as total FROM bidang as b join subbidang as s ON b.id_bidang = s.id_bidang join kegiatan as k on s.id_sub = k.id_sub join uraian as u on k.id_kegiatan = u.id_kegiatan join rincian as r on u.id_uraian = r.id_uraian group by s.id_sub;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $data1 = array();
  while($row = $result->fetch_assoc()) {
    $bidang_id = $row['id_bidang'];
    $bidang_name = $row['nama_bidang'];
    $sub_id = $row['id_sub'];
    $sub_name = $row['nama_sub'];
    $dana=$row['total'];

    $bidang_exists = false;
    foreach ($data1 as &$item) {
      if ($item['id_bidang'] == $bidang_id) {
        $bidang_exists = true;
        $item['data_sub'][] = array('id_sub' => $sub_id, 'nama_sub' => $sub_name,'dana'=>$dana);
        break;
      }
    }

    if (!$bidang_exists) {
      $data1[] = array('id_bidang' => $bidang_id, 'nama_bidang' => $bidang_name, 'data_sub' => array(array('id_sub' => $sub_id, 'nama_sub' => $sub_name,'dana'=>$dana)));
    }
  }

} else {
  echo "0 results";
};
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
              <span class="padding-bottom--15">RAB</span>
              <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">Bidang</th>
                    <th scope="col">Sub-bidang</th>
                    <th scope="col">Dana</th>
                    <th scope="col">Action</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      foreach ($data1 as $bidang) {
                        $temp1=1;
                        $total=0;
                        foreach ($bidang['data_sub'] as $sub) {
                          $total=$total+$sub['dana'];
                        };
                        foreach ($bidang['data_sub'] as $sub) {
                          $temp2 = count($bidang["data_sub"]);
                          if ($temp1 == 1) {
                            echo "<tr>";
                              echo "<td style = 'vertical-align: middle' rowspan=$temp2 scope='row'>" . $bidang['nama_bidang'] . "</td>";
                              echo "<td scope='row'>" . $sub['nama_sub'] . "</td>";
                              echo "<td scope='row'>" . $sub['dana'] . "</td>";
                              echo "<td scope='row'><a href='table2.php?id={$sub['id_sub']}'>[Detail]</a></td>";
                              echo "<td style = 'vertical-align: middle' rowspan=$temp2 scope='row'>" . $total . "</td>";
                            echo "</tr>";
                            $temp1 = $temp1+1;
                          } else {
                              echo "<tr>";
                                echo "<td scope='row'>" . $sub['nama_sub'] . "</td>";
                                echo "<td scope='row'>" . $sub['dana'] . "</td>";
                                echo "<td scope='row'><a href='table2.php?id={$sub['id_sub']}'>[Detail]</a></td>";
                              echo "</tr>";
                          }                       
                        };
                      };
                    ?>
                </tbody>
                </table>
                <div class="field padding-bottom--24" style="width: 100px;">
                  <input class="btn btn-primary" type="submit" name="Back" value="Back" onclick="parent.location='index.php'">
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