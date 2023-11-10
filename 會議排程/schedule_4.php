<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../會議排程/schedule.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>

<body style="background-color: #f7f1f1;">
    <nav class="navbar fixed-top" style="background-color: #586d9a;">
        <div class="container-fluid">
            <span class="title">
                <img src="../image/mis.png" alt="Logo" width="100" height="55" class="logo" >
                會議排程
                <a href="./notify.php">
                    <img src="../image/通知.png" alt="Notify" width="55" height="45" class="notify" >
                </a>
            </span> 
        </div>
    </nav>
    <div>
        <img src="../image/步驟4.png"  width="250" height="15" style="margin-top: 80px; margin-left: 60px; margin-bottom: 10px;">
    </div>
    <div style="font-weight: bold; font-size: 15px; margin-left: 40px;">
        會議成員&ensp; 會議日期&emsp;建議時間&emsp;&emsp; 確認
    </div>
    <div class="textConfirm">
        會議時間：XX/XX&emsp; XX:XX<br><br>
        會議室：<br><br>
        會議成員：<br>
        <img src="../image/成員.png" alt="Notify" width="30" height="30" style="margin: 5px;" >
        <img src="../image/成員.png" alt="Notify" width="30" height="30" style="margin: 5px;">
        <img src="../image/成員.png" alt="Notify" width="30" height="30" style="margin: 5px;">
        <br>
        <p style="font-size: 15px;">&nbsp;XXX&emsp;XXX&nbsp;&nbsp;&nbsp;&nbsp;XXX</p>
    </div>
    <a href="./schedule_3.php">
        <div>
            <button type="button" class="ButtonStyle1">上一步</button>
        </div>
    </a>
    <div>
        <button type="button" class="ButtonStyle2" style="background-color:#87c4a3 ; border-color: #87c4a3;">確認</button>
    </div>
</body>
</html>