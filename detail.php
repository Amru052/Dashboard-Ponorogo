<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<?php
$idd = $_REQUEST['id'];
include 'db.php';

$sql = "SELECT 
            bidang.nama_bidang, subbidang.nama_sub,subbidang.id_sub,
            kegiatan.id_kegiatan, kegiatan.nama_kegiatan, kegiatan.tanggal,
            uraian.id_uraian,uraian.nama_uraian,
            rincian.id_rincian, rincian.nama_rincian, rincian.volume, rincian.harga, rincian.satuan
        FROM bidang 
        JOIN subbidang ON bidang.id_bidang = subbidang.id_bidang
        JOIN kegiatan ON subbidang.id_sub = kegiatan.id_sub
        JOIN uraian ON kegiatan.id_kegiatan = uraian.id_kegiatan
        JOIN rincian ON uraian.id_uraian = rincian.id_uraian
        WHERE kegiatan.id_kegiatan = $idd;
";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    $data_uraian = array();
    while($row = $result->fetch_assoc()) {
      $nama_bidang = $row['nama_bidang'];
      $nama_sub = $row['nama_sub'];
      $id_kegiatan = $row['id_kegiatan'];
      $nama_kegiatan = $row['nama_kegiatan'];
      $tanggal=$row['tanggal'];
      $id_uraian=$row['id_uraian'];
      $id_sub = $row['id_sub'];

      $nama_uraian = $row['nama_uraian'];
      $id_rincian = $row['id_rincian'];
      $nama_rincian = $row['nama_rincian'];
      $volume = $row['volume'];
      $harga=$row['harga'];
      $satuan=$row['satuan'];
  
      $uraian_exists = false;
      foreach ($data_uraian as &$item) {
        if ($item['nama_uraian'] == $nama_uraian) {
          $uraian_exists = true;
          $item['data_rincian'][] = array('id_rincian' => $id_rincian, 'nama_rincian' => $nama_rincian,'harga'=>$harga,'volume'=>$volume,'satuan'=>$satuan);
          break;
        }
      }
  
      if (!$uraian_exists) {
        $data_uraian[] = array('nama_uraian' => $nama_uraian, 'data_rincian' => array(array('id_rincian' => $id_rincian, 'nama_rincian' => $nama_rincian,'harga'=>$harga,'volume'=>$volume,'satuan'=>$satuan)));
      }
    }
    $data3 = array(
        "nama_bidang"=>$nama_bidang,
        "nama_sub"=>$nama_sub,
        "nama_keg"=>$nama_kegiatan,
        "tanggal"=>$tanggal,
        "id_keg"=>$idd,
        "data_uraian"=>$data_uraian);
    print_r($data3);
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
              <span class="padding-bottom--15">Detail RAB: </span>
              <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td style = 'width:250px' scope='row'>Bidang</td>
                        <td scope='col'>: <?php echo $data3["nama_bidang"]; ?></td>
                    </tr>
                    <tr>
                        <td scope='row'>Sub-bidang</td>
                        <td scope='col'>: <?php echo $data3["nama_sub"]; ?></td>
                    </tr>
                    <tr>
                        <td scope='row'>Kegiatan</td>
                        <td scope='col'>: <?php echo $data3["nama_keg"]; ?></td>
                    </tr>
                    <tr>
                        <td scope='row'>Waktu Pelaksanaan</td>
                        <td scope='col'>: <?php echo $data3["tanggal"]; ?></td>
                    </tr>
              </table>
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    <th scope="col">Uraian</th>
                    <th scope="col">Rincian</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th style = "text-align: center" scope="col">Action</th>
                    <th scope="col" style='text-align: center'>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($data3['data_uraian'] as $uraian) {
                        $temp1=1;
                        $total=0;
                        foreach ($uraian['data_rincian'] as $rincian) {
                          $temp3 = $rincian['volume']*$rincian['harga'];
                          $total=$total+$temp3;
                        };
                        foreach ($uraian['data_rincian'] as $rincian) {
                          $temp2 = count($uraian["data_rincian"]);
                          $temp3 = $rincian['volume']*$rincian['harga'];
                          if ($temp1 == 1) {
                            echo "<tr>";
                              echo "<td style = 'vertical-align: middle' rowspan=$temp2 scope='row'>" . $uraian['nama_uraian'] . "</td>";
                              echo "<td scope='row'>" . $rincian['nama_rincian'] . "</td>";
                              echo "<td scope='row'>" . $rincian['volume'] . "</td>";
                              echo "<td scope='row'>" . $rincian['satuan'] . "</td>";
                              echo "<td scope='row'>" . $rincian['harga'] . "</td>";
                              echo "<td scope='row'>" . $temp3 . "</td>";
                              echo "<td style = 'text-align: center' scope='row'><a href='table2.php?id={}'>[Edit]</a><a href='table2.php?id={}'>[Delete]</a></td>";
                              echo "<td style = 'text-align: center; vertical-align: middle' rowspan=$temp2 scope='row'>" . $total . "</td>";
                            echo "</tr>";
                            $temp1 = $temp1+1;
                          } else {
                              echo "<tr>";
                              echo "<td scope='row'>" . $rincian['nama_rincian'] . "</td>";
                              echo "<td scope='row'>" . $rincian['volume'] . "</td>";
                              echo "<td scope='row'>" . $rincian['satuan'] . "</td>";
                              echo "<td scope='row'>" . $rincian['harga'] . "</td>";
                              echo "<td scope='row'>" . $temp3 . "</td>";
                              echo "<td style = 'text-align: center' scope='row'><a href='table2.php?id={}'>[Edit]</a><a href='table2.php?id={}'>[Delete]</a></td>";
                              echo "</tr>";
                          }                       
                        };
                      };
                    ?>
                    </table>
                <div class="field padding-bottom--24" style="width: 100px;">
                <input class="btn btn-primary" type="submit" name="Back" value="Back" onclick="window.location.href='table2.php?id=<?php echo $id_sub; ?>'">
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