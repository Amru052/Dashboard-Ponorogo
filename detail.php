<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link rel="stylesheet" type="text/css" href="style1.css">
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
          <h1>Dashboard Ponorogo</h1>
        </div>
        <div class="formbg2-outer">
          <div class="formbg2">
            <div class="formbg2-inner padding-horizontal--48">
              <span class="padding-bottom--15">Detail RAB: </span>
              <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td scope='row'>Bidang</td>
                        <td scope='col'>: Pelaksanaan Pembangunan Desa</td>
                    </tr>
                    <tr>
                        <td scope='row'>Sub-bidang</td>
                        <td scope='col'>: Pekerjaan Umum dan Penataan Ruang</td>
                    </tr>
                    <tr>
                        <td scope='row'>Kegiatan</td>
                        <td scope='col'>: Pembangunan Prasarana Jalan Desa</td>
                    </tr>
                    <tr>
                        <td scope='row'>Waktu Pelaksanaan</td>
                        <td scope='col'>: 11/11/2011</td>
                    </tr>
                    </table>
                    <table class="table table-hover">
                    <thead>
                    <tr>
                    <th scope="col">Nomer</th>
                    <th scope="col">Uraian</th>
                    <th scope="col">Rincian</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col" style='text-align: center'>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope='row'>1</td>
                        <td scope='col'>Belanja Honorarium</td>
                        <td scope='col'>Honorarium TPK</td>
                        <td scope='col'>1,550,000</td>
                        <td rowspan="2" scope="col" style='text-align: center; vertical-align: middle'>2,300,000</td>
                    </tr>
                    <tr>
                        <td scope='row'></td>
                        <td scope='col'></td>
                        <td scope='col'>Honorarium Tim Pemeriksa</td>
                        <td scope='col'>750.000</td>
                    </tr>
                    <tr>
                        <td scope='row'>2</td>
                        <td scope='col'>Belanja Upah</td>
                        <td scope='col'>Pekerja</td>
                        <td scope='col'>17,700,000</td>
                        <td rowspan="2" scope="col" style='text-align: center; vertical-align: middle'>25,435,000</td>
                    </tr>
                    <tr>
                        <td scope='row'></td>
                        <td scope='col'></td>
                        <td scope='col'>Tukang</td>
                        <td scope='col'>7,735,000</td>
                    </tr>
                    </table>
                <div class="field padding-bottom--24" style="width: 100px;">
                  <input class="btn btn-primary" type="submit" name="Back" value="Back" onclick="parent.location='table.php'">
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