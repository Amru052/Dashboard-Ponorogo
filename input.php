<?php
include 'db.php';
global $conn;
  if(isset($_REQUEST['phase'])){
    $phase = $_REQUEST['phase'];
  };
  if(isset($_REQUEST['idu'])){
    $idu = $_REQUEST['idu'];
  };
  if(isset($_REQUEST['idk'])){
    $idk = $_REQUEST['idk'];
  };

// fase 1 (fase input bidang-subbidang)
  if ($phase == 1){
    if (isset($_POST["submit"])){
      $id_bidang = $_POST["bidang"];
      $id_sub = $_POST["subbidang"];
      $kegiatan = $_POST["kegiatan"];
      $tanggal_kegiatan = $_POST["tanggal_kegiatan"];
    };
    
    $sql = "SELECT * FROM subbidang WHERE id_bidang IS null;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $sql = "UPDATE subbidang SET id_bidang = $id_bidang WHERE id_bidang IS null;";
      mysqli_query($conn, $sql);
    };


    $sql = "SELECT max(serial_kegiatan) as serial_kegiatan from kegiatan;";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $id_kegiatan = "K" . ($row['serial_kegiatan'] + 1);;
      };
    $sql = "INSERT INTO kegiatan (id_kegiatan, nama_kegiatan, tanggal, id_sub)
              VALUES ('$id_kegiatan', '$kegiatan', '$tanggal_kegiatan', '$id_sub')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "<script>alert('Data Tidak Berhasil Ditambahkan');window.location='index.php';</script>";
    } else {
      header('location:indexu.php?phase=2'.'&idk='.$id_kegiatan);
    };
    exit;

// fase 2 (fase input uraian dengan rincian)
  } elseif ($phase == 2){
    if (isset($_POST["submit"])){
      $uraian = $_POST["uraian"];
      $rincian = $_POST["rincian"];
      $volume = $_POST["volume"];
      $satuan = $_POST["satuan"];
      $harga = $_POST["harga"];
      $submitValue = $_POST["submit"];
    };
    // mengambil mengambil serial uraian untuk id_uraian
    $sql = "SELECT max(serial_uraian) as serial_uraian from uraian;";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $id_uraian = "U".($row['serial_uraian']+1);
    };
    // insert uraian
    $sql = "INSERT INTO uraian (id_uraian, nama_uraian, id_kegiatan)
              VALUES ('$id_uraian', '$uraian', '$idk')";
    $result = mysqli_query($conn, $sql);
    //mengambil serial rincian untuk id_rincian
    $sql = "SELECT max(serial_rincian) as serial_rincian from rincian;";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $serial_rincian = $row['serial_rincian'];
    };
    // insert rincian
    $sql = "insert into rincian(id_rincian, nama_rincian, volume, harga, satuan, id_uraian) values ";
    for ($i = 0; $i < count($rincian); $i++) {
        if (!empty($rincian[$i]) && !empty($volume[$i]) && !empty($harga[$i]) && !empty($satuan[$i]) && !empty($id_uraian)) {
            $serial_rincian = $serial_rincian + 1;
            $sql = $sql . "('R" . ($serial_rincian) . "', '" . $rincian[$i] . "', " . $volume[$i] . ", " . $harga[$i] . ", '" . $satuan[$i] . "', '" . $id_uraian . "'),";
        }
    };
    $sql=substr($sql, 0, -1).";";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "<script>alert('Data Tidak Berhasil Ditambahkan');window.location='indexu.php?phase=2&idk=".$idk."';</script>";
    } else {
      if ($submitValue == "Tambah Rincian"){
        header('location: indexr.php?phase=3'.'&idk='.$idk.'&idu=' . $id_uraian);
      } elseif ($submitValue == "Tambah Uraian"){
        header('location: indexu.php?phase=2'.'&idk='.$idk);
      };
      exit;
    };

// fase 3 (fase input rincian tambahan)
  } elseif ($phase == 3){
    if (isset($_POST["submit"])){
      $rincian = $_POST["rincian"];
      $volume = $_POST["volume"];
      $satuan = $_POST["satuan"];
      $harga = $_POST["harga"];
    };
    //mengambil serial rincian untuk id_rincian
    $sql = "SELECT max(serial_rincian) as serial_rincian from rincian;";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        $serial_rincian = $row['serial_rincian'];
    };
    // insert rincian
    $sql = "insert into rincian(id_rincian, nama_rincian, volume, harga, satuan, id_uraian) values ";
    for ($i = 0; $i < count($rincian); $i++) {
      if (!empty($rincian[$i]) && !empty($volume[$i]) && !empty($harga[$i]) && !empty($satuan[$i])) {
        $serial_rincian = $serial_rincian + 1;
        $sql = $sql . "('R" . ($serial_rincian) . "', '" . $rincian[$i] . "', " . $volume[$i] . ", " . $harga[$i] . ", '" . $satuan[$i] . "', '" . $idu . "'),";
      };
    };
    $sql=substr($sql, 0, -1).";";
    echo($sql);
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "<script>alert('Data Tidak Berhasil Ditambahkan');window.location='indexu.php?phase=2&idk=".$id_kegiatan."';</script>";
    } else {
      if ($submitValue == "Tambah Rincian"){
        header('location: indexr.php?phase=3'.'&idk='.$idk.'&idu=' . $idu);
      } elseif ($submitValue == "Tambah Uraian"){
        header('location: indexu.php?phase=2'.'&idk='.$idk);
      };
      header('location:indexu.php?phase=2'.'&idk='.$idk);
    };
  } else {
    echo "error 123";
  };
?>
