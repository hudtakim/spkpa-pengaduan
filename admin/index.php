<?php
  session_start();
  include '../functions/globalVariable.php';

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
              <a class="navbar-brand" href="<?=$rootUrl;?>">SKPA</a>
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
          <h2 class="d-flex justify-content-center mb-5">Laporan Masuk</h2>
          
          <form action="index.php" method="GET" onkeydown="return event.key != 'Enter';">
            <div class="form-row align-items-center">
              <div class="col-auto">
                <select class="custom-select mr-sm-2 form-control form-control" id="filterStatusSelection" name="filterStatus">
                  <option value="semua">Semua</option>
                  <option value="masuk">Masuk</option>
                  <option value="diproses">Diproses</option>
                  <option value="selesai">Selesai</option>
                  <option value="ditolak">Ditolak</option>
                </select>
              </div>
              <div class="col-auto">
                <select class="custom-select mr-sm-2 form-control form-control" id="numRowShownSelection" name="rowNumShown">
                  <option value="5">5</option>
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
              <div class="col-auto ">
                <button type="submit" class="btn btn-outline-primary" name="filterAction" value="filter">Tampilkan</button>
              </div>
              
              <div class="col-auto ml-auto">
                  <input type="text" name="searchByName" class="form-control" id="searchInput" aria-describedby="" placeholder="Cari berdasarkan nama">
                </div>
                <div class="col-auto">
                  <button id="searchButton" type="submit" class="btn btn-outline-primary" name="filterAction" value="search">Search</button>
              </div>
            </div>
          </form>

          <table class="table mt-3">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama/Inisial</th>
                <th>Tanggal/Waktu Laporan</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              
              <?php
                if(isset($_GET["lastOffset"])) { $offset = $_GET["lastOffset"]; } else { $offset = 0; } 
                if(isset($_GET["rowNumShown"])) { $maxRowShown = $_GET["rowNumShown"]; } else { $maxRowShown = 5; }
                if(isset($_GET['numOfPages'])) { $currentPage = $_GET['numOfPages']; } else { $currentPage = 1; }
                if(isset($_GET['searchByName'])) { $nameToSearch = $_GET['searchByName']; } else { $nameToSearch = ""; }

                if(isset($_GET['rowNumShown'])){
                  $maxRowShown = (int)$_GET['rowNumShown'];
                  if($maxRowShown == '5') { $selectIndex = 0; }
                  if($maxRowShown == '10') { $selectIndex = 1; }
                  if($maxRowShown == '25') { $selectIndex = 2; }
                  if($maxRowShown == '50') { $selectIndex = 3; }
                  if($maxRowShown == '100') { $selectIndex = 4; }
                  echo "<script>document.getElementById('numRowShownSelection').selectedIndex = '$selectIndex';</script>";
                }

                if(isset($_GET["direction"])){
                  $direction = $_GET["direction"];
                  $lastOffset = $_GET["lastOffset"];

                  if($direction == 'min'){ $offset = 0; $currentPage = 1;}
                  if($direction == 'prev'){ $offset = $lastOffset - $maxRowShown; $currentPage = ceil(($offset + $maxRowShown) / $maxRowShown);}
                  if($direction == 'next'){ $offset = $lastOffset + $maxRowShown; $currentPage = ceil(($offset + $maxRowShown) / $maxRowShown);}
                  if($direction == 'max'){ $offset = ($_GET['numOfPages'] * $maxRowShown) - $maxRowShown ; $currentPage = $_GET['numOfPages'];}
                }

                $limit = $offset + $maxRowShown;

                if(isset($_GET["filterStatus"])){
                  $selectedStatus = $_GET["filterStatus"];
                  if($selectedStatus == 'semua') { $selectIndex = 0; }
                  if($selectedStatus == 'masuk') { $selectIndex = 1; }
                  if($selectedStatus == 'diproses') { $selectIndex = 2; }
                  if($selectedStatus == 'selesai') { $selectIndex = 3; }
                  if($selectedStatus == 'ditolak') { $selectIndex = 4; }
                  echo "<script>document.getElementById('filterStatusSelection').selectedIndex = '$selectIndex';</script>";
                }else{
                  $selectedStatus = 'semua';
                  echo "<script>document.getElementById('filterStatusSelection').selectedIndex = '0';</script>";
                }

                //reset selected status filter to semua if doing search
                if(isset($_GET['filterAction'])){ 
                  $filterAction = $_GET['filterAction'];
                  if($filterAction == "search" && $nameToSearch == ""){
                    $selectedStatus = 'semua';
                    echo "<script>document.getElementById('filterStatusSelection').selectedIndex = '0';</script>";
                  }
                }
                //Search By Name
                if($nameToSearch != "") {
                  $selectedStatus = 'semua';
                  echo "<script>document.getElementById('filterStatusSelection').selectedIndex = '0';</script>";
                  $listFormulir = mysqli_query($conn, "SELECT * from formulir_tb WHERE namaPelapor LIKE '$nameToSearch%' ORDER BY id DESC");
                }
                //Filter by status
                else if($selectedStatus == 'semua'){
                  $listFormulir = mysqli_query($conn, "SELECT * from formulir_tb ORDER BY id DESC");
                }else{
                  $listFormulir = mysqli_query($conn, "SELECT * from formulir_tb WHERE statusAduan = '$selectedStatus' ORDER BY id DESC");
                }
                
                //Pagination
                $numRows = mysqli_num_rows($listFormulir);
                if($numRows == 0) { $numOfPages = 1; }
                else { $numOfPages = ceil($numRows / $maxRowShown); }
                
                if(mysqli_num_rows($listFormulir) > 0){
                  $num = 1;
                  while($data = mysqli_fetch_array($listFormulir)):
                    if($num > $offset && $num <= $limit && $num <= $numRows){
                      if($data['statusAduan'] == 'masuk') { $color = 'black'; }
                      if($data['statusAduan'] == 'diproses') { $color = 'blue'; }
                      if($data['statusAduan'] == 'selesai') { $color = 'green'; }
                      if($data['statusAduan'] == 'ditolak') { $color = 'red'; }
              ?>

                <tr>
                  <td><?=$num;?></td>
                  <td><?=$data['namaPelapor'];?></td>
                  <td><?=$data['tanggalPengaduan'];?></td>
                  <td style="color: <?=$color?>;"><?=ucfirst($data['statusAduan']);?></td>
                  <td>
                    <form action="detail-aduan.php" method="GET">
                      <input type="hidden" name="id" value="<?=$data['id'];?>"  required>
                      <button type="submit" class="btn btn-primary btn-sm">Lihat detail</button>
                    </form>
                  </td>    
                </tr> 

              <?php
                    }
                    $num++;
                  endwhile;
                } else {?>

                <tr>
                  <td>Tidak ada data</td>
                </tr> 

              <?php
                }
              ?>
        
            </tbody>
          </table>

          <div class="mt-4" style="display: flex; justify-content: center;">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li id="min-page" class="page-item"><a class="page-link" href="index.php?filterStatus=<?=$selectedStatus;?>&direction=min&lastOffset=<?=$offset;?>&searchByName=<?=$nameToSearch;?>"> << </a></li>
                <li id="prev-page" class="page-item"><a class="page-link" href="index.php?filterStatus=<?=$selectedStatus;?>&direction=prev&lastOffset=<?=$offset;?>&searchByName=<?=$nameToSearch;?>"> < </a></li>
                <li class="page-item"><a class="page-link" href="#" style="pointer-events: none;"> <?=$currentPage;?> &nbsp; / &nbsp; <?=$numOfPages;?> </a></li>
                <li id="next-page" class="page-item"><a class="page-link" href="index.php?filterStatus=<?=$selectedStatus;?>&direction=next&lastOffset=<?=$offset;?>&searchByName=<?=$nameToSearch;?>"> > </a></li>
                <li id="max-page" class="page-item"><a class="page-link" href="index.php?filterStatus=<?=$selectedStatus;?>&direction=max&lastOffset=<?=$offset;?>&numOfPages=<?=$numOfPages;?>&searchByName=<?=$nameToSearch;?>"> >> </a></li>
              </ul>
            </nav>
          </div>

          <?php 
            //disable pagination button if reach it's limit
            if($currentPage == 1){
              echo "<script>document.getElementById('min-page').style.pointerEvents = 'none';</script>";
              echo "<script>document.getElementById('prev-page').style.pointerEvents = 'none';</script>";
            }
            if($currentPage == $numOfPages){
              echo "<script>document.getElementById('next-page').style.pointerEvents = 'none';</script>";
              echo "<script>document.getElementById('max-page').style.pointerEvents = 'none';</script>"; 
            }
          ?>

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