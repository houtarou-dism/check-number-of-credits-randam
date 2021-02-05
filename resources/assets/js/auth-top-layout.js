const randomMin = 1000;
const randomMax = 4000;

const select_name = document.getElementById('select-name');
const count = document.getElementById('reset-count');

//ルーレットにセットする値
let name = [];

const copyName = [];

$('#submit-btn').on('click', function () {

    setTimeout(function(){
        $('#submit-btn').prop("disabled", true);
    },1);

    //nameの要素数が０の場合、配列を復活させる
    if (name.length === 0){
        name = copyName;
    }

    //既存のテキストを削除し、ローディングgifを挿入
    select_name.textContent = '';
    select_name.insertAdjacentHTML('afterbegin','<img src="https://credit-check.coposa.work/storage/images/loadings/loading_g_n.gif" alt="loading" height="40px" width="40px">');

    //ランダム整数を生成
    let num = Math.floor(Math.random() * name.length);
    let select = name[num];

    //1000~4000秒後にテキストを挿入
    setTimeout(function(){
        select_name.textContent = '';
        count.textContent = name.length.toString();
        select_name.insertAdjacentHTML('afterbegin', select);
        $('#submit-btn').prop("disabled", false);
    }, Math.floor(Math.random() * (randomMax - randomMin)) + randomMin);

    //生成された整数の要素を削除
    name = name.filter(v => v !== name[num]);
})
