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

    <link href="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/air-datepicker@3.3.5/air-datepicker.min.js"></script>
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
        <img src="../image/步驟2.png"  width="250" height="15" style="margin-top: 80px; margin-left: 60px; margin-bottom: 10px;">
    </div>
    <div style="font-weight: bold; font-size: 15px; margin-left: 40px;">
        會議成員&ensp; 會議日期&emsp;建議時間&emsp;&emsp; 確認
    </div>
    
    <div class="textDate">
        <p style="text-align: center;">會議日期區段選擇</p>
        <p>開始</p>
        <input name="date" class="input" id="input">
        <p >結束</p>
        <input name="date" class="input" id="input2">
    </div>
    <a href="./schedule_1.php">
        <div>
            <button type="button" class="ButtonStyle1">上一步</button>
        </div>
    </a>
    <a href="./schedule_3.php">
        <div>
            <button type="button" class="ButtonStyle2">下一步</button>
        </div>
    </a>


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
        new AirDatepicker('#input2',{
                locale: tw, // Set language
                navTitles: {
                                days: '<strong>yyyy</strong> <i>MMMM</i>'
                }
            });
    </script>
</body>
</html>