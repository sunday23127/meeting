<?php
       session_start();

       if($_GET['code'])
       {
        $db = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼 
            'meeting');  // 預設使用的資料庫名稱 
        if ( !$db ) {
            echo "MySQL資料庫連接錯誤!<br/>";
            exit();
        }
        else {
            //echo "MySQL資料庫test連接成功!<br/>";
        }

        
        $user_onlyID=$_SESSION["user_onlyID"];

        $sql3 = "SELECT UId FROM user WHERE Userid = '$user_onlyID'";
    
        $stmt2 = $db->query($sql3);

   
        if($stmt2->num_rows > 0)
        {
        
            echo "<script>alert('已登入')</script>";
        }
        }
    
        // 建立MySQL的資料庫連接 
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            
            $db = @mysqli_connect( 
                    'localhost',  // MySQL主機名稱 
                    'root',       // 使用者名稱 
                    '',  // 密碼 
                    'meeting');  // 預設使用的資料庫名稱 
            if ( !$db ) {
                echo "MySQL資料庫連接錯誤!<br/>";
                exit();
            }
            else {
                //echo "MySQL資料庫test連接成功!<br/>";
            }

            $uid = $_POST['id'];
            $name = $_POST['Name'];
            $identity=$_POST['identity'];
            $phone = $_POST['Phone'];
            $user_onlyID=$_SESSION["user_onlyID"];

            $sql = "SELECT UId FROM user WHERE UId = '$uid'";
            
            $stmt = $db->query($sql);
     
           
            if($stmt->num_rows > 0)
            {
                
                echo "<script>alert('編號已登入')</script>";
            }
            else
            {
                
                
                $sql2 = "INSERT INTO user (UId,Name,identity,phone,Userid) VALUES ('$uid','$name','$identity','$phone','$user_onlyID')";
            
                if($db->query($sql2) === TRUE)
                {
                  echo "<script>alert('登入成功')</script>";
                 }
                else
                {
                  echo "<script>alert('登入失敗')</script>";
                }
                mysqli_close($db);  // 關閉資料庫連接
            }
        }  
            
                
            
    
             
        
    ?>


    
   
    <?php
        session_start();
        global $user_onlyID;

        $get_code = $_GET['code'];

        $client_id='2000638575';
        $client_secret='8bd06fe8e5a46df24a197bfa0d37d46e';

        $data = array(
        "grant_type"=>"authorization_code",
        "code"=>$get_code,
        "redirect_uri"=>"http://localhost/meeting/login/login.php",
        "client_id"=>$client_id,
        "client_secret"=>$client_secret);

        $data_string=http_build_query($data);

        $ch = curl_init('https://api.line.me/oauth2/v2.1/token');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/x-www-form-urlencoded')
        );

        $result = curl_exec($ch);
        //echo $result;
        $return_arr=array();
        $return_arr=json_decode($result, true);


        // 解析 id_token
        $data = array(
        "id_token"=>$return_arr['id_token'],
        "client_id"=>$client_id);


        $data_string=http_build_query($data);

        //echo $data_string;
        $ch = curl_init('https://api.line.me/oauth2/v2.1/verify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded')
        );

        $result2 = curl_exec($ch);
        //echo $result2;
        $return_arr2=array();
        $return_arr2=json_decode($result2, true);
        //echo $return_arr2;
        // 取得姓名
        $user_name=$return_arr2['name'];
        //echo $user_name;
        // 取得line編號
        $user_onlyID=$return_arr2['sub'];
        $_SESSION["user_onlyID"]= $user_onlyID;
        //echo $user_onlyID; 
        $db = @mysqli_connect( 
            'localhost',  // MySQL主機名稱 
            'root',       // 使用者名稱 
            '',  // 密碼 
            'meeting');  // 預設使用的資料庫名稱 
        if ( !$db ) {
            echo "MySQL資料庫連接錯誤!<br/>";
            exit();
        }
        else {
            //echo "MySQL資料庫test連接成功!<br/>";
        }

        

        
        
    ?>
