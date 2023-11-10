
<!DOCTYPE html>
<html lang="Zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">        
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../login/linelogin.css">
    <script src="js/jquery-1.3.2.js"></script> 
    <title>LINE Login </title>
</head>

<body style="background-color: #f7f1f1;">
    <nav class="navbar fixed-top" style="background-color: #586d9a;">
        <div class="container-fluid">
            <span class="title">
                <img src="../image/mis.png" alt="Logo" width="100" height="55" class="logo" >
                       登入
            </span> 
        </div>
    </nav>

    <div class="signupFrm">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form" name="log" id="login">
        <div class="text1">
            登入

        </div>
        
        <input type="submit"  onclick="LineAuth()" class="submitBtn" id="submitButton" value="line 登入"  no-repeat center;>
    </div>           
       
   

    <script>
        function LineAuth(d5_owner_num)
        {       
            var URL = 'https://access.line.me/oauth2/v2.1/authorize?';
            URL += 'response_type=code';
            URL += '&client_id=2000638575';//
            URL += '&redirect_uri=http://localhost/meeting/login/login.php';
            URL += '&state=abc123';
            URL += '&scope=openid%20profile';
            window.open(URL);
        }
        
        
    </script>

   

</body>
</html>