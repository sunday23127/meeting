<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../預約/reserve.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../預約/jquery-clockpicker.min.css">
    <link rel="stylesheet" type="text/css" href="../預約/github.min.css">
    <script type="text/javascript" src="../預約/jquery.min.js"></script>
    <script type="text/javascript" src="../預約/jquery-clockpicker.min.js"></script>
</head>

<body style="background-color: #f7f1f1;">
    <nav class="navbar fixed-top" style="background-color: #586d9a;">
        <div class="container-fluid">
            <span class="title">
                <img src="../image/mis.png" alt="Logo" width="100" height="55" class="logo" >
                預約
            </span> 
        </div>
    </nav>
    <br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label class="text" style="margin-top:60px; margin-bottom:20px">預約日期</label>
        <br>
        <input name="date" class="inputDate" id="input">
        <br>
        <label class="text" style="margin-top:20px; margin-bottom:20px">預約時間</label>
        <br>
        <input name="time1" type="text" class="inputTime clockpicker" style="margin-right: 0px;" value="09:30"> ~ <input name="time2" type="text" class="inputTime clockpicker2" style="margin-left: 0px;" value="09:30">
        <br>
        <label class="text" style="margin-top:20px; margin-bottom:20px">預約會議室</label>
        <br>
        <select name="room" class="dropdown">
            <option>請選擇</option>
            <option>302</option>
            <option>824</option>
            <option>825</option>
        </select>
        <input type="submit" class="ButtonStyle" value="確認預約">
    </form>
    
    <?php
    
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

            $sql = "SELECT OId FROM orderr ORDER BY OId DESC LIMIT 1";
            $stmt = $db->query($sql);
            
            if ($stmt) {
                $result = mysqli_fetch_object($stmt);
                $oid = $result->OId + 1;  // 新的 OId 值
            } else {
                // 如果没有数据，就从 1 开始
                $oid = 1;
            }

         
            $date = $_POST['date'];
            $time1 = $_POST['time1'];
            $time2 = $_POST['time2'];
            $room = $_POST['room'];

            $sql2 = "INSERT INTO orderr (OId,Room,ODate,OTimeS,OTimeE) VALUES ('$oid','$room','$date','$time1','$time2')";
            if($db->query($sql2) === TRUE)
            {
                echo "<script>alert('預約成功')</script>";
            }
            else
            {
                echo "<script>alert('預約失敗')</script>";
            }
            mysqli_close($db);  // 關閉資料庫連接
        }
    ?>

    
    <script>
        const tw = {
                days: ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'],
                daysShort: ['日', '一', '二', '三', '四', '五', '六'],
                daysMin: ['日', '一', '二', '三', '四', '五', '六'],
                months: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                monthsShort: ['一月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
                today: 'Today',
                clear: 'Clear',
                dateFormat: 'yyyy/MM/dd',
                timeFormat: 'hh:mm aa',
                firstDay: 0
            }
        new AirDatepicker('#input',{
                locale: tw, // Set language
                navTitles: {
                                days: '<strong>yyyy</strong> <i>MMMM</i>'
                }
            });
    </script>

<!--<div class="input-group clockpicker inputTime">
    <input type="text" class="form-control" value="09:30">
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>-->
<script type="text/javascript">
$('.clockpicker').clockpicker();
$('.clockpicker2').clockpicker();
</script>
</body>
</html>