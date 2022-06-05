<?php
    include 'globalVariable.php';

    $namaPelapor = $_GET["namaPelapor"];
    $kontak = $_GET["kontak"];
    $alamatPelapor = $_GET["alamatPelapor"];
    $statusPelapor = $_GET["statusPelapor"];
    $waktuKejadian = $_GET["waktuKejadian"];
    $namaTerlapor = $_GET["namaTerlapor"];
    $kronologi = $_GET["kronologi"];
    date_default_timezone_set("Asia/Jakarta");
    $tanggalPengaduan = date('d-m-y h:i:s A');

    $result = mysqli_query($conn, "INSERT INTO formulir_tb(namaPelapor, kontak, alamatPelapor, statusPelapor, waktuKejadian, namaTerlapor, kronologi, tanggalPengaduan) 
              VALUES('$namaPelapor','$kontak', '$alamatPelapor', '$statusPelapor','$waktuKejadian','$namaTerlapor','$kronologi', '$tanggalPengaduan')");

    if($result == 1){
        $message = "Aduan anda berhasil dikirim, silahkan menunggu kabar dari kami.";
        echo "<script>alert('$message'); window.location.replace('$rootUrl');</script>";
    }else{
        $message = "Gagal mengirim aduan. Mohon coba beberapa saat lagi atau hubungi admin SPKPA.";
        echo "<script>alert('$message'); window.location.replace('$rootUrl');</script>";
    }
?>