<?php      
    include '../../functions/globalVariable.php';
    session_start();
    
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
    //to prevent from mysqli injection  
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $username = mysqli_real_escape_string($conn, $username);  
    $password = mysqli_real_escape_string($conn, $password);  
      
    $sql = "SELECT * FROM admin_tb WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
          
    if($count == 1){  
        $_SESSION['legitUser'] = $sessionKey;
        $message = "Login Sukses !!!";
        echo "<script>alert('$message'); window.location.replace('../index.php');</script>";
    }  
    else{         
        $message = "Username atau Password Salah!!!";
        echo "<script>alert('$message'); window.location.replace('../login.php');</script>";
    }     
?>  