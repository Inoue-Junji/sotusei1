// "use strict";

// const lapCount  = 200; // ラップ保持数
// let lapNum = 1;

// const storage = getStorage();

// let state       = storage.state       ?? 0, // 動作状態
//     startTime   = storage.startTime   ?? 0, // スタートタイム
//     stopTime    = storage.stopTime    ?? 0, // ストップタイム
//     lapTime     = storage.lapTime     ?? 0, // ラップスタートタイム
//     lapStopTime = storage.lapStopTime ?? 0, // ラップストップタイム
//     id; // setInterval ID

// onload = function() {
//     // localStorageに動作状態が保存されていた場合は動作状態復元
//     if(state === 1) {
//         if(id = setInterval(printTime, 1)) {
//             document.querySelector('#start').value = 'STOP';
//             document.querySelector('#reset').value = 'LAP';
//         }
//         setStorage();
//     }
// }

// const eventHandlerType =
//     window.ontouchstart !== undefined ? 'touchstart' : 'mousedown';

// // START押下時イベント
// document.querySelector('#start').addEventListener(eventHandlerType, function() {
//     // 停止中
//     if(state === 0) {
//         // カウント開始
//         if(id = startCount()) {
//             // ボタンのラベル変更
//             document.querySelector('#start').value = 'STOP';
//             document.querySelector('#reset').value = 'LAP';
//             // 動作状態を変更
//             state = 1;
//             setStorage();
//         }
//     }
//     // 動作中
//     else {
//         // カウントインターバルが動作中
//         if(id) {
//             // インターバル停止
//             clearInterval(id);
//             // カウント停止
//             stopCount();
//             // ボタンのラベルを戻す
//             document.querySelector('#start').value = 'START';
//             document.querySelector('#reset').value = 'RESET';
//             // 動作状態を変更
//             state = 0;
//             deleteStorage();
//         }
//     }
// }, false);

// // RESET押下時イベント
// document.querySelector('#reset').addEventListener(eventHandlerType, function() {
//     // 停止中ならリセット
//     if(state === 0) {
//         stopTime    = 0;
//         lapStopTime = 0;
//         // 表示初期化
//         document.querySelector('#lap').innerHTML = '';
//         document.querySelector('#disp').textContent = '0:00:00.000 / 0:00:00.000';
//     }
//     // 動作中ならLAP動作
//     else {
//         // #lap内の最後にdiv要素追加
//         document.querySelector('#lap').appendChild(document.createElement("div"));

//         // 追加した要素に経過時間表示
//         document.querySelector('#lap>div:last-of-type').textContent = (lapNum++) + ' : ' + getTimeString();

//         lapTime = Date.now();

//         // lap保持数を超えたら先頭の子要素を削除
//         if(document.querySelector('#lap').childElementCount > lapCount)
//             document.querySelector('#lap').removeChild(document.querySelector('#lap').childNodes[0]);

//         // スクロール位置を最下部に
//         document.querySelector('#lap').scrollTop = document.querySelector('#lap').scrollHeight;

//         setStorage();
//     }
// }, false);

// // カウント開始
// function startCount() {
//     const now = Date.now();
//     startTime = now - stopTime;
//     lapTime   = now - lapStopTime;
//     return setInterval(printTime, 1);
// }

// // カウント停止
// function stopCount() {
//     const now   = Date.now()
//     stopTime    = now - startTime;
//     lapStopTime = now - lapTime;
// }

// // 経過時間表示
// function printTime() {
//     document.querySelector('#disp').textContent = getTimeString();
// }

// function getTimeString() {
//     const
//         now       = Date.now(),
//         time      = now - startTime,
//         splitTime = now - lapTime,

//         main =
//             Math.floor(time / 3600000) + ':' +
//             String(Math.floor(time / 60000) % 60).padStart(2, '0') + ':' +
//             String(Math.floor(time / 1000) % 60).padStart(2, '0') + '.' +
//             String(time % 1000).padStart(3, '0'),

//         split =
//             Math.floor(splitTime / 3600000) + ':' +
//             String(Math.floor(splitTime / 60000) % 60).padStart(2, '0') + ':' +
//             String(Math.floor(splitTime / 1000) % 60).padStart(2, '0') + '.' +
//             String(splitTime % 1000).padStart(3, '0');

//     return main + ' / ' + split;
// }

// // localStorage保存
// function setStorage() {
//     localStorage.setItem('stopwatch_params', JSON.stringify({
//         state: state,
//         startTime: startTime,
//         stopTime: stopTime,
//         lapTime: lapTime,
//         lapStopTime: lapStopTime,
//     }));
// }

// // localStorage削除
// function deleteStorage() {
//     localStorage.removeItem('stopwatch_params');
// }

// // localStorage取得
// function getStorage() {
//     const params = localStorage.getItem('stopwatch_params');
//     return params ? JSON.parse(params) : {};
// }

'use strict';

const
    storageKey = 'stopWatch_Multiple',
    s = localStorage.getItem(storageKey),
    storage = s !== null ? JSON.parse(s) : [],
    obj = {},
    cEvent = window.ontouchstart !== undefined ? 'touchstart' : 'mousedown',
    resolutionArr = [19, 21, 22, 23];

let unitId = 0,
    hold = 0,
    resolution = 2,
    numOfDay = 0;

window.addEventListener('DOMContentLoaded', function() {
    // localStorageに状態保持データがあれば復元
    if(storage.length) {
        let tmp = 0;
        for(let i in storage) {
            addUnit(storage[i]);
            if(storage[i].id > tmp) tmp = storage[i].id;
        }
        unitId = tmp + 1;
    }
    // 無ければ新規ユニット1個追加
    else {
        addUnit();
    }

    // 各モード状態復元
    const
        s = localStorage.getItem(storageKey + '_m'),
        storageModeParameters = s !== null ? JSON.parse(s) : {};

    if(storageModeParameters.hold !== undefined) {
        hold = storageModeParameters.hold;
        setHold();
    }
    if(storageModeParameters.resolution !== undefined) {
        document.getElementById('resolution').value = 
        resolution = storageModeParameters.resolution;
        setResolution();
    }
    if(storageModeParameters.numOfDay !== undefined) {
        numOfDay = storageModeParameters.numOfDay;
        setNumOfDay();
    }

    // 全スタートボタン
    document.getElementById('allStart').addEventListener('click', function() {
        const now = Date.now();
        // 停止中の全ユニットスタート
        for(let i in obj) {
            const o = obj[i];
            if(o.sTime <= 0) {
                o.sTime += now;
                o.lTime += now;
                o.start.textContent = 'STOP';
                o.reset.textContent = 'LAP';
                o.start.style.backgroundColor = '#f88';
            }
        }
        saveUnitParameters();
    });

    // 全ストップボタン
    document.getElementById('allStop').addEventListener('click', function() {
        const now = Date.now();
        // 動作中の全ユニットストップ
        for(let i in obj) {
            const o = obj[i];
            if(o.sTime > 0) {
                o.sTime -= now;
                o.lTime -= now;
                o.view.textContent = timeString(-o.sTime);
                o.lap.textContent = timeString(-o.lTime);
                o.start.textContent = 'START';
                o.reset.textContent = 'RESET';
                o.start.style.backgroundColor = '#8f8';
            }
        }
        saveUnitParameters();
    });

    // リセットボタン
    document.getElementById('allReset').addEventListener('click', function() {
        if(confirm('状態保持データを削除して計測ユニットをリセットします。\nReturns all operations to the initial state.')) {
            allReset();
        }
    });

    // 誤操作防止/解除ボタン
    document.getElementById('hold').addEventListener('click', function(){
        hold ^= 1;
        setHold();
        saveModeParameters();
    });

    // 1秒以下分解能セレクタ
    document.getElementById('resolution').addEventListener('change', function() {
        if(resolutionArr[this.value] === undefined) return;
        resolution = this.value;
        setResolution();
        saveModeParameters();
    });

    // 日数表示ボタン
    document.getElementById('numOfDay').addEventListener('click', function(){
        numOfDay ^= 1;
        setNumOfDay();
        saveModeParameters();
    });

    // exportボタン
    document.getElementById('export').addEventListener('click', function(){
        const modal = document.querySelector('.exportModal');
        exportText(modal.querySelector('.text'));
        modal.style.display = 'block';
        modal.querySelector('.close').addEventListener('click', function(){
            modal.style.display = 'none';
        });
    });

    count();
});

function setHold() {
    for(let i in obj) {
        const o = obj[i];
        o.start.disabled   =
        o.reset.disabled   =
        o.add.disabled     =
        o.close.disabled   =
        o.caption.disabled = hold;
    }
    document.getElementById('allStop').disabled  =
    document.getElementById('allStart').disabled =
    document.getElementById('allReset').disabled = hold;

    const d = document.getElementById('hold');
    if(hold % 2 === 1) {
        d.style.backgroundColor = '#fcc';
    }
    else {
        d.style.backgroundColor = '';
    }
}

function setResolution() {
    for(let i in obj) {
        const o = obj[i];
        if(o.sTime <= 0) {
            o.view.textContent = timeString(-o.sTime);
            o.lap.textContent  = timeString(-o.lTime);
        }
    }
}

function setNumOfDay() {
    for(let i in obj) {
        const o = obj[i];
        if(o.sTime <= 0) {
            o.view.textContent = timeString(-o.sTime);
            o.lap.textContent  = timeString(-o.lTime);
        }
    }

    const d = document.getElementById('numOfDay');
    if(numOfDay % 2 === 1) {
        d.style.backgroundColor = '#cff';
    }
    else {
        d.style.backgroundColor = '';
    }
}

function allReset() {
    localStorage.removeItem(storageKey);
    for(let i in obj) delete obj[i];
    unitId = 0;
    document.getElementById('container').innerHTML = '';

    localStorage.removeItem(storageKey + '_m');
    hold = 0;
    document.getElementById('resolution').value = resolution = 2;
    numOfDay = 0;
    setHold();
    setResolution();
    setNumOfDay();

    addUnit();
}

function count() {
    const now = Date.now();
    for(let i in obj) {
        const o = obj[i];
        if(o.sTime > 0) {
            o.view.textContent = timeString(now - o.sTime);
            o.lap.textContent = timeString(now - o.lTime);
        }
    }
    requestAnimationFrame(count);
}

function timeString(time) {
    const
        s = numOfDay ? 11 : 14,
        r = resolutionArr[resolution];
    return (numOfDay ? Math.floor(time / 864e5) + '.' : Math.floor(time / 36e5) + ':') + 
        new Date(time).toISOString().slice(s, r);
}

// ユニット追加
function addUnit(storageObj) {
    unitId++;
    const id = storageObj !== undefined ? storageObj.id : unitId;

    document.getElementById('container').appendChild(document.createElement('div'));
    document.getElementById('container').lastChild.outerHTML =
        "<div class='unit' id='u" + id + "'>" +
        "    <input type='text' class='caption' placeholder='-- No Caption --'>" +
        "    <button class='add'>+</button>" +
        "    <button class='close'>x</button>" +
        "    <div class='view'></div>" +
        "    <div class='lap'></div>" +
        "    <button class='reset'>RESET</button>" +
        "    <button class='start'>START</button>" +
        "</div>";

    const unit = document.getElementById('u' + id);

    obj[id] = {
        id     : id,
        close  : unit.querySelector('.close'),
        add    : unit.querySelector('.add'),
        reset  : unit.querySelector('.reset'),
        start  : unit.querySelector('.start'),
        view   : unit.querySelector('.view'),
        lap    : unit.querySelector('.lap'),
        caption: unit.querySelector('.caption'),
        sTime  : storageObj !== undefined ? storageObj.sTime : 0,
        lTime  : storageObj !== undefined ? storageObj.lTime : 0,
    };

    if(Object.keys(obj).length === 1 && !(storageObj !== undefined && storage.length > 1)) {
        closeButtonDisplay(false);
    }

    const o = obj[id];
    o.view.textContent = timeString(-o.sTime);
    o.lap.textContent = timeString(-o.lTime);

    if(o.sTime > 0) {
        o.start.textContent = 'STOP';
        o.reset.textContent = 'LAP';
        o.start.style.backgroundColor = '#f88';
    }
    else {
        o.start.style.backgroundColor = '#8f8';
    }

    if(storageObj !== undefined) {
        o.caption.value = storageObj.caption;
    }

    // クローズボタン
    o.close.addEventListener('click', function() {
        document.getElementById('container').removeChild(
            document.getElementById('u' + o.id)
        );
        delete obj[o.id];
        if(Object.keys(obj).length === 1) {
            closeButtonDisplay(false);
        }
        saveUnitParameters();
    });
    // 追加ボタン
    o.add.addEventListener('click', function() {
        addUnit();
        if(Object.keys(obj).length === 2) {
            closeButtonDisplay(true);
        }
        saveUnitParameters();
    });
    // リセットボタン
    o.reset.addEventListener(cEvent, function() {
        if(this.disabled) return;
        const now = Date.now();
        // 停止中
        if(o.sTime <= 0) {
            // リセット
            o.sTime = o.lTime = 0;
            o.view.textContent = timeString(o.sTime);
            o.lap.textContent = timeString(o.lTime);
        }
        // 計測中
        else {
            // LAP(メイン及びスプリットタイムを新規ユニットに計測停止状態で複製)
            const newCaption = o.caption.value.replace(/(:Lap)?$/, ':Lap');
            addUnit({
                id     : unitId + 1,
                caption: newCaption,
                sTime  : o.sTime - now,
                lTime  : o.lTime - now,
            });
            // 親ユニットのスプリットタイムをリセット
            o.lTime = now;
            if(Object.keys(obj).length === 2) {
                closeButtonDisplay(true);
            }
        }
        saveUnitParameters();
    });
    // スタートボタン
    o.start.addEventListener(cEvent, function() {
        if(this.disabled) return;
        const now = Date.now();
        // 計測中
        if(o.sTime > 0) {
            // 計測停止
            o.sTime -= now;
            o.lTime -= now;
            o.view.textContent = timeString(-o.sTime);
            o.lap.textContent = timeString(-o.lTime);
            o.start.textContent = 'START';
            o.reset.textContent = 'RESET';
            o.start.style.backgroundColor = '#8f8';
        }
        // 停止中
        else {
            // 計測開始・再開
            o.sTime += now;
            o.lTime += now;
            o.start.textContent = 'STOP';
            o.reset.textContent = 'LAP';
            o.start.style.backgroundColor = '#f88';
        }
        saveUnitParameters();
    });
    // キャプション
    o.caption.addEventListener('input', function() {
        saveUnitParameters();
    });
}

function closeButtonDisplay(f) {
    document.querySelector('#container .unit .close').style.display = f ? '' : 'none';
}

function saveUnitParameters() {
    const data = [];
    for(let i in obj) {
        const o = obj[i];
        data.push({
            id     : o.id,
            sTime  : o.sTime,
            lTime  : o.lTime,
            caption: o.caption.value
        });
    }
    // ユニット1個、時間0で停止、キャプションなしの場合は削除
    if(data.length === 1 && data[0].sTime === 0 && data[0].caption === '') {
        localStorage.removeItem(storageKey);
    }
    else {
        localStorage.setItem(storageKey, JSON.stringify(data));
    }
}

function saveModeParameters() {
    const
        key = storageKey + '_m',
        data = {
            hold      : +hold,
            resolution: +resolution,
            numOfDay  : +numOfDay,
        };
    localStorage.setItem(key, JSON.stringify(data));
}

function exportText(e) {
    let str = '';
    const now = Date.now();
    for(let i in obj) {
        const o = obj[i];
        const l = [];
        l.push('"' + o.caption.value.replace(/"/g, '""') + '"');
        l.push(timeString(o.sTime > 0 ? now - o.sTime : -o.sTime));
        l.push(timeString(o.lTime > 0 ? now - o.lTime : -o.lTime));
        str += l.join(', ') + "\n";
    }
    e.value = '"' + new Date().toLocaleString() + "\"\n" + str;
}