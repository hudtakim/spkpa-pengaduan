<?php
  session_start();
  include '../functions/globalVariable.php';
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
            </ul>
            </div>
        </div>
      </nav>
    
    <h3 class="d-flex justify-content-center" style="margin-top:100px;">Login Admin</h3>
    <div class="container mt-5 mb-5">
        <form name="f1" action = "functions/handleLogin.php" onsubmit = "return validation()" method = "POST">  
            <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan username">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Masukkan password</label>
            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="bg-dark mt-5"">
        <!-- Footer -->
        <footer class="container page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 text-light" style="margin-top:130px;">© 2022 Copyright:
            <a href="<?=$rootUrl;?>">spkpa.com</a>
            </div>
            <!-- Copyright -->
        
        </footer>
        <!-- Footer -->
    </div>

    <script>  
        function validation()  
        {  
            var id=document.f1.user.value;  
            var ps=document.f1.pass.value;  
            if(id.length=="" && ps.length=="") {  
                alert("User Name and Password fields are empty");  
                return false;  
            }  
            else {  
                if(id.length=="") {  
                    alert("User Name is empty");  
                    return false;  
                }   
                if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                }  
            }                             
        }  
    </script>  
</body>
</html>