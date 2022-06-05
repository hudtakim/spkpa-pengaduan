<?php
  include '../functions/globalVariable.php';
  session_start();
  if($_SESSION['legitUser'] != $sessionKey){
    die(header("location: login.php"));
  } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPKPA - Laman Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?=$rootUrl;?>">SPKPA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link" href="<?=$rootUrl;?>">Home</a>
                </li>

            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$rootUrl;?>/admin">Laman Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="functions/handleLogout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
      </nav>

      <div class="jumbotron">
        <div class="container mt-5">
            <h1 class="display-4">Laman Admin SPKPA,</h1>
            <p class="lead">SPKPA merupakan Sarana Pengaduan Kekerasan Perempuan dan Anak dalam Lingkup Wilayah Kota Magelang. Kami berkerja sama dengan Dinas Pemberdayaan Perempuan dan Perlindungan Anak Kota Magelang.</p>
            <hr class="my-4">
            <p>Sistem pelayanan tindak lanjut pengaduan kasus kekerasan terhadap perempuan dan anak di wilayah Kota Magelang akan dilaksanakan dalam 1 x 24 jam.</p>
        </div>
      </div>

      <div class="container mt-5">
        <h2 class="d-flex justify-content-center mb-5">Detail Aduan</h2>
        <?php
            $id = $_GET["id"];
            $data = mysqli_query($conn, "SELECT * from formulir_tb WHERE (id='$id')");
            $data = mysqli_fetch_array($data);
        ?>

        <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Nama/Inisial Pelapor:</label>
              <input type="text" class="form-control" aria-describedby="keterangan-nama" placeholder="<?=$data['namaPelapor'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kontak yang bisa dihubungi:</label>
                <input type="text" class="form-control" placeholder="<?=$data['kontak'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Domisili/Alamat Pelapor:</label>
                <input type="text" class="form-control" placeholder="<?=$data['alamatPelapor'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Status Pelapor:</label>
                <input type="text" class="form-control" placeholder="<?=$data['statusPelapor'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Waktu/Tempat Kejadian:</label>
                <input type="text" class="form-control" placeholder="<?=$data['waktuKejadian'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama/Inisial Terlapor:</label>
                <input type="text" class="form-control" aria-describedby="namaTerlapor" placeholder="<?=$data['namaTerlapor'];?>" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kronologi/Bukti:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="<?=$data['kronologi'];?>" disabled></textarea>
            </div>
            <div class="form-group">
                <?php
                    if($data['statusAduan'] == 'masuk') { $color = 'black'; }
                    if($data['statusAduan'] == 'diproses') { $color = 'blue'; }
                    if($data['statusAduan'] == 'selesai') { $color = 'green'; }
                    if($data['statusAduan'] == 'ditolak') { $color = 'red'; }
                ?>
                <label for="exampleInputEmail1">Status Aduan: </label> <p style="color: <?=$color?>; display:inline;"><?=ucfirst($data['statusAduan']);?></p>
            </div>
          </form>
          
          <div class="row">
            <div class="col-lg-10">
                <?php
                if($data['statusAduan'] == 'masuk'){
                ?>
                <form action="functions/handleLaporan.php" method="GET" style="display: inline;">
                    <input type="hidden" name="id" value="<?=$data['id'];?>"  required>
                    <input type="hidden" name="aksi" value="diproses"  required>
                    <button type="submit" class="btn btn-info mt-3" onclick="return confirmAction('proses-aduan')">Proses Aduan</button>
                </form>
                <form action="functions/handleLaporan.php" method="GET" style="display: inline;">
                    <input type="hidden" name="id" value="<?=$data['id'];?>"  required>
                    <input type="hidden" name="aksi" value="ditolak"  required>
                    <button type="" class="btn btn-danger mt-3 ml-2" onclick="return confirmAction('tolak-aduan')">Tolak Aduan</button>
                </form>
                
                <?php
                }else if($data['statusAduan'] == 'diproses'){
                ?>
                <form action="functions/handleLaporan.php" method="GET" style="display: inline;">
                <input type="hidden" name="id" value="<?=$data['id'];?>"  required>
                <input type="hidden" name="aksi" value="selesai"  required>
                <button type="" class="btn btn-success mt-3" onclick="return confirmAction('kasus-selesai')">Kasus Selesai</button>
                </form>
                
                <?php
                }else{
                ?>
                <form action="functions/handleLaporan.php" method="GET" style="display: inline;">
                <input type="hidden" name="id" value="<?=$data['id'];?>"  required>
                <input type="hidden" name="aksi" value="dihapus"  required>
                <button type="" class="btn btn-danger mt-3" onclick="return confirmAction('hapus-aduan')">Hapus Aduan</button>
                </form>
                
                <?php
                }
                ?>
            </div>
            <div class="col-lg-2">
                <a href="<?=$rootUrl;?>/admin" style="text-decoration: none;">
                    <button type="" class="btn btn-primary mt-3 btn-block">Kembali</button>
                </a>
            </div>
          </div>
      </div>

    <div class="bg-dark mt-5">
        <!-- Footer -->
        <footer class="container page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 text-light" style="margin-top: 200px;">© 2022 Copyright:
            <a href="<?=$rootUrl;?>">spkpa.com</a>
            </div>
            <!-- Copyright -->
        
        </footer>
        <!-- Footer -->
    </div>
</body>
</html>

<script>
      // The function below will start the confirmation dialog
      function confirmAction(action) {
        let confirmAction1 = "";
        if(action == 'hapus-aduan'){confirmAction1 = confirm("Anda yakin untuk menghapus data aduan ini?");}
        if(action == 'proses-aduan'){confirmAction1 = confirm("Anda yakin untuk memproses aduan ini?");}
        if(action == 'tolak-aduan'){confirmAction1 = confirm("Anda yakin untuk menolak aduan ini?");}
        if(action == 'kasus-selesai'){confirmAction1 = confirm("Kasus pada aduan ini telah dianggap selesai?");}
        
        if (confirmAction1) {
			 return true;
        } else {
			return false;
        }
      }
</script>