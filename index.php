<?php 
    include 'functions/globalVariable.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPKPA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
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
                    <a class="nav-link" href="#linkToForm">Kirim Aduan</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#linkToKontak">Kontak</a>
                </li>
            </ul>
            </div>
        </div>
      </nav>

      <div class="jumbotron">
        <div class="container mt-5">
            <h1 class="display-4">Selamat datang di SPKPA,</h1>
            <p class="lead">SPKPA merupakan Sarana Pengaduan Kekerasan Perempuan dan Anak dalam Lingkup Wilayah Kota Magelang. Kami berkerja sama dengan Dinas Pemberdayaan Perempuan dan Perlindungan Anak Kota Magelang.</p>
            <hr class="my-4">
            <p>Sistem pelayanan tindak lanjut pengaduan kasus kekerasan terhadap perempuan dan anak di wilayah Kota Magelang akan dilaksanakan dalam 1 x 24 jam.</p>
            <p class="lead">
            <a class="btn btn-primary btn-lg mt-3" href="#linkToForm" role="button">Buat aduan sekarang!</a>
            </p>
        </div>
      </div>

    <div class="proses-pengaduan">
    </div>

    <div class="formulir container mb-5">
        <a id="linkToForm">
            <h3 class="d-flex justify-content-center mb-5">Formulir Pengaduan</h3>
        </a>
        <form action="<?=$rootUrl;?>/functions/handleSubmit.php" method="GET">
            <div class="form-group">
              <label>Nama/Inisial Pelapor:</label>
              <input type="text" class="form-control" aria-describedby="keterangan-nama" placeholder="Masukkan nama/inisial pelapor" name="namaPelapor" required>
              <small id="keterangan-nama" class="form-text text-muted">Nama pelapor akan dijamin kerahasiaannya.</small>
            </div>
            <div class="form-group">
                <label>Kontak yang bisa dihubungi:</label>
                <input type="text" class="form-control" placeholder="Contoh: 08123xxxxx" name="kontak" required>
            </div>
            <div class="form-group">
                <label>Domisili/Alamat Pelapor:</label>
                <input type="text" class="form-control" placeholder="Masukkan domisili/alamat pelapor" name="alamatPelapor" required>
            </div>
            <div class="form-group">
                <label>Status Pelapor:</label>
                <input type="text" class="form-control" placeholder="Contoh: Tetangga/Teman/Orang asing" name="statusPelapor" required>
            </div>
            <div class="form-group">
                <label>Waktu/Tempat Kejadian:</label>
                <input type="text" class="form-control" placeholder="Tempat, jam dan tanggal" name="waktuKejadian" required>
            </div>
            <div class="form-group">
                <label>Nama/Inisial Terlapor:</label>
                <input type="text" class="form-control" aria-describedby="keterangan-nama" placeholder="Masukkan nama/inisial terlapor" name="namaTerlapor" required>
            </div>
            <div class="form-group">
                <label>Kronologi/Bukti:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Tulis/Ceritakan kronologi dan bukti yang ada" name="kronologi" required></textarea>
            </div>

            <div class="form-check mt-5">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
              <label class="form-check-label" for="exampleCheck1">Saya menyatakan bahwa data pada formulir yang telah diisikan di atas adalah benar.</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>

    <div class="jumbotron mb-0 pt-4" style="margin-top: 100px;">
        <div class="container">
            <a id="linkToKontak">
                <h3 class="d-flex justify-content-center">Kontak Kami</h3>
            </a>
            <hr class="my-4">
            <p class="lead mt-5">Untuk pertanyaan lebih lanjut harap hubungi kami melalui:</p>
            <p class="">Email: spkpa@aduan.com</p>
        </div>
      </div>

    <div class="bg-dark">
        <!-- Footer -->
        <footer class="container page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 text-light">© 2022 Copyright:
            <a href="<?=$rootUrl;?>">spkpa.com</a>
            </div>
            <!-- Copyright -->
        
        </footer>
        <!-- Footer -->
    </div>

</body>
</html>