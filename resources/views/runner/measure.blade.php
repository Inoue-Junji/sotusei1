<!--<!doctype html>-->
<!--<html lang='ja'>-->
<!--<head>-->
<!--<meta charset='utf-8'>-->
<!--<meta name='viewport' content='user-scalable=no,width=device-width,initial-scale=1'>-->
<!--<title>stopwatch</title>-->
<!--<style>-->
<!--    html {-->
<!--        touch-action: manipulation;-->
<!--        -webkit-touch-callout: none;-->
<!--    }-->
<!--    div.button {-->
<!--        box-sizing: border-box;-->
<!--        position: relative;-->
<!--        width: 100%;-->
<!--        text-align: center;-->
<!--    }-->
<!--    input[type='button'] -->
<!--    {-->
<!--        width: 48%;-->
<!--        height: 50px;-->
<!--        max-width: 180px;-->
<!--        font-size: 25px;-->
<!--        border-radius: 8px;-->
<!--        background-color: #fff;-->
<!--        -webkit-appearance: none;-->
<!--        -webkit-user-select: none;-->
<!--        cursor: pointer;-->
<!--    }-->
<!--    div#disp {-->
<!--        position: relative;-->
<!--        text-align: center;-->
<!--        font-size: 5.5vw;-->
<!--        margin-bottom: 20px;-->
<!--        -webkit-user-select: none;-->
<!--    }-->
<!--    div#lap {-->
<!--        position: relative;-->
<!--        text-align: center;-->
<!--        font-size: 18px;-->
<!--        height: 300px;-->
<!--        overflow-y: scroll;-->
<!--        width: 100%;-->
<!--        min-height: 200px;-->
<!--        margin-top: 60px;-->
<!--        margin-bottom: 10px;-->
<!--        left: 0px;-->
<!--    }-->
<!--    div#mask {-->
<!--        position: relative;-->
<!--        width: 100%;-->
<!--        overflow: hidden;-->
<!--        margin: auto;-->
<!--    }-->
<!--    div#lap>div {-->
<!--        font-size: 4vw;-->
<!--    }-->
<!--    #container {-->
<!--        width: 100%;-->
<!--        text-align: center;-->
<!--    }-->
<!--</style>-->
<!--</head>-->
<!--<body>-->
<!--    <div id='container'>-->
<!--        <div id='mask'>-->
<!--            <div id='lap'></div>-->
<!--        </div>-->
<!--        <div id='disp'>0:00:00.000 / 0:00:00.000</div>-->
<!--        <div class='button'>-->
<!--        <input type='button' id='start' value='START'>-->
<!--        <input type='button' id='reset' value='RESET'>-->
<!--        </div>-->
<!--    </div>-->
<!--    <script src={{ asset('/js/measure.js') }}></script>-->
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html lang='ja'>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='user-scalable=no,width=device-width,initial-scale=1'>
        <title>stopwatch multiple</title>
        <link rel='stylesheet' href="{{ secure_asset('css/style.css')}}">
        <script src='script.js'></script>
    </head>
    <body>
        <div class='allControl'>
            <button id='allReset'>ALL RESET</button>
            <button id='export'>TEXT</button>
            <button id='allStop'>ALL STOP</button>
            <button id='allStart'>ALL START</button>
            <button id='hold'>HOLD</button>
            <select id='resolution'>
                <option value='0'>1</option>
                <option value='1'>1/10</option>
                <option value='2' selected>1/100</option>
                <option value='3'>1/1000</option>
            </select>
            <button id='numOfDay'>Day.Hour</button>
        </div>
        <div id='container'>
        </div>
        <div class='exportModal'>
            <button class='close'>x</button>
            <textarea class='text'></textarea>
        </div>
         <script src={{ asset('/js/measure.js') }}></script>
    </body>
</html>