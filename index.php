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
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <form class="needs-validation" action="input.php?phase=1" method="POST" novalidate>
                <span>Input: </span>
                  <fieldset class="form-group ">
                    <div class="row question padding-bottom--3">
                      <legend class="col-form-label col-sm-10 pt-0">Jenis Rencana Anggaran Belanja</legend>
                      <div class="form-row">
                        <div class="row padding-bottom--3">
                          <div class="col-md-9 mb-3">
                            <legend class="col-form-label col-sm-10 pt-0">Bidang</legend>
                            <?php
                              include 'db.php';
                              $sql = "SELECT id_bidang, nama_bidang from bidang group by id_bidang;";
                              $result = $conn->query($sql);
                              ?>
                              <select class="form-select" aria-label="Default select example" name="bidang" required>
                              <option selected disabled>Open this select menu</option>
                              <?php
                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $id_bidang = $row["id_bidang"];
                                  $nama_bidang = $row["nama_bidang"];
                                  echo ("<option value=$id_bidang>$nama_bidang</option>");
                                }
                              } else {
                                echo "0 results";
                              };
                              echo ("</select>")
                            ?>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="field" style="padding-top: 30px;">
                            <a class="btn" href="table2.php?id=<?php echo $sub['id_sub']; ?>">[+] Tambah</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="row padding-bottom--3">
                          <div class="col-md-9 mb-3">
                            <legend class="col-form-label col-sm-10 pt-0">Sub-Bidang</legend>
                            <?php
                              $sql = "SELECT id_sub,nama_sub from subbidang group by id_sub;";
                              $result = $conn->query($sql);
                              ?>
                              <select class="form-select" aria-label="Default select example" name="subbidang" required>
                              <option selected disabled>Open this select menu</option>
                              <?php
                              if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $id_sub = $row["id_sub"];
                                  $nama_sub = $row["nama_sub"];
                                  echo ("<option value=$id_sub>$nama_sub</option>");
                                }
                              } else {
                                echo "0 results";
                              };
                              echo ("</select>")
                            ?>
                          </div>
                          <div class="col-md-3 mb-3">
                            <div class="field" style="padding-top: 30px;">
                            <a class="btn" href="table2.php?id=<?php echo $sub['id_sub']; ?>">[+] Tambah</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="row padding-top--24">
                          <div class="col-md-9 mb-3">
                            <legend class="col-form-label col-sm-10 pt-0">Kegiatan</legend>
                            <input type="text" class="form-control" name="kegiatan" placeholder="Pembangunan Prasarana Jalan Desa" required>
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                          </div>
                          <div class="col-md-3 mb-3">
                          <legend class="col-form-label col-sm-10 pt-0">Tanggal Kegiatan</legend>
                            <input type="date" class="form-control" name="tanggal_kegiatan" placeholder="19" required>
                            <div class="valid-feedback">
                              Looks good!
                            </div>
                          </div>
                        </div>
                      </div>

                </fieldset>
                <div class="field padding-bottom--24">
                  <input class="btn btn-primary" type="submit" name="submit" value="Selanjutnya">
                </div>
              </form>

              <script>
              // Example starter JavaScript for disabling form submissions if there are invalid fields
              function autoHeight(elem) {
                elem.style.height = "auto";
                elem.style.height = (elem.scrollHeight) + "px";
              }
              (function() {
                'use strict';
                window.addEventListener('load', function() {
                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  // [A,[Rincian],[Dana]],[B,[RIncian],[Dana]]
                  var forms = document.getElementsByClassName('needs-validation');
                  // Loop over them and prevent submission
                  var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                      if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                      }
                      form.classList.add('was-validated');
                    }, false);
                  });
                }, false);
              })();
              </script>
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

