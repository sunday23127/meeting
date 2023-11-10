<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../取消預約/cancel.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <style>
        /* 添加被選中預約紀錄的樣式 */
        .selected {
            background-color: #9ea2c7; /* 修改為你想要的顏色 */
        }
    </style>
    <script>
        function selectRecord(element) {
            // 切換被選中的紀錄的樣式
            var selectedRecords = document.querySelectorAll(".text2");
            for (var i = 0; i < selectedRecords.length; i++) {
                selectedRecords[i].classList.remove("selected");
            }
            element.classList.add("selected");
        }
    </script>
    <script>
        if(window.history.replaceState)
        {
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
</head>

<body style="background-color: #f7f1f1;">
    <nav class="navbar fixed-top" style="background-color: #586d9a;">
        <div class="container-fluid">
            <span class="title">
                <img src="../image/mis.png" alt="Logo" width="100" height="55" class="logo" >
                取消預約
            </span> 
        </div>
    </nav>
    <div class="text1">
        預約紀錄
    </div>
    <?php
        
            // 建立MySQL的資料庫連接 
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
            $sql = "SELECT OId,ODate,DATE_FORMAT(OTimeS,'%H:%i') As OTimeS,DATE_FORMAT(OTimeE,'%H:%i') As OTimeE,Room,user.Name FROM orderr,user WHERE orderr.UId=user.UId AND user.UId=10";
            if($stmt = $db->query($sql))
            {
                while($result=mysqli_fetch_object($stmt))
                {
                    echo'<div class="text2" onclick="selectRecord(this);" >
                            預定時間 '.$result->ODate.' '.$result->OTimeS.'~'.$result->OTimeE.'<br>
                            預定地點 '.$result->Room.'<br>
                            預約人 '.$result->Name.'<input type="hidden" name="reservation_id" value="'.$result->OId.'">
                        </div>';
                }  
            }
            mysqli_close($db);  // 關閉資料庫連接
       
    ?>

    <script>
        // 獲取所有文字框
        var Records = document.querySelectorAll(".text2");

        // 為每個文字框添加點擊事件
        for (var i = 0; i < Records.length; i++) {
            Records[i].addEventListener("click", function() {
                var reservationId = this.querySelector("input[name='reservation_id']").value;
                
                var form = document.getElementById("cancelForm");
                form.querySelector("input[name='reservationId']").value = reservationId;
        
            });
        }
    </script>

    <?php
        // 建立MySQL的資料庫連接 
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["reservationId"]))
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

            $id = $_POST['reservationId'];

            $sql = "DELETE FROM orderr WHERE OId= '$id'";
            if($db->query($sql) === TRUE)
            {
                echo "<script>alert('取消成功')</script>";
                echo "<script>location.reload()</script>";
            }
            else
            {
                echo "<script>alert('取消失敗')</script>";
            }
            mysqli_close($db);  // 關閉資料庫連接
        }
    ?>
   
   <form id="cancelForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="hidden" name="reservationId" value="">
        <button type="submit" class="ButtonStyle">取消預約</button>
    </form>    
</body>
</html>

