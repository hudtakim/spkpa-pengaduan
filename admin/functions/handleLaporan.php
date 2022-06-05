<?php
    include '../../functions/globalVariable.php';
    session_start();
    if($_SESSION['legitUser'] != $sessionKey){
        die(header("location: ../login.php"));
      } 

    $id = $_GET["id"];
    $aksi = $_GET["aksi"];

    if($aksi == 'dihapus'){
        $result = mysqli_query($conn, "DELETE FROM formulir_tb WHERE (id='$id')");
        if($result){
            header('location: '.$rootUrl.'/admin');
        }else{
            echo 'Error';
        }
    }else{
        $result = mysqli_query($conn, "UPDATE formulir_tb SET statusAduan='$aksi' WHERE (id='$id')");
        if($result){
            $url = 'location: '.$rootUrl.'/admin/detail-aduan.php?id='.$id;
            header($url);
        }else{
            echo 'Error';
        }
    }
?>