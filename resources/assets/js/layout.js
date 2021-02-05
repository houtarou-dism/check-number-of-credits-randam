const name = $("input[name='item']");
const freshmanSubmitBtn = $("#freshman-submit-btn");
const sophomoreSubmitBtn = $("#sophomore-submit-btn");
const juniorSubmitBtn = $("#junior-submit-btn");
const checkSubmitBtn = $("#check-submit-btn");
const freshmanConfirmationSubmitBtn = $("#confirmation-freshman-submit-button");
const sophomoreConfirmationSubmitBtn = $("#confirmation-sophomore-submit-button");
const juniorConfirmationSubmitBtn = $("#confirmation-junior-submit-button");
const seniorConfirmationSubmitBtn = $("#confirmation-senior-submit-button");
let storage = sessionStorage;

name.on("keypress", function (e) {
    if (e.which === 13) {
        return false;
    }
});

$("#select-submit-btn").on("click", function() {

    storage.clear();        //storageの全削除

    setTimeout(function(){
        $("#select-submit-btn").prop("disabled", true);
    },1);

    setTimeout(function(){
        $("#select-submit-btn").prop("disabled", false);
    },3000);
});

function checkboxData(select_year) {

    let data = [];
    let keyData = 0;
    let frm = document.getElementById(select_year);

    for(let i=0; i<frm.item.length; i++){
        if(frm.item[i].checked){
            data[keyData] = frm.item[i].value;
            keyData++;
        }
    }

    storage.setItem(select_year,  JSON.stringify(data));
}

freshmanSubmitBtn.one("click", function() {

    freshmanSubmitBtn.removeClass('submit-btn');
    freshmanSubmitBtn.addClass('submit-btn-disabled');

    checkboxData('freshman');
});

sophomoreSubmitBtn.one("click", function() {

    sophomoreSubmitBtn.removeClass('submit-btn');
    sophomoreSubmitBtn.addClass('submit-btn-disabled');

    checkboxData('sophomore');
});

juniorSubmitBtn.one("click", function() {

    juniorSubmitBtn.removeClass('submit-btn');
    juniorSubmitBtn.addClass('submit-btn-disabled');

    checkboxData('junior');
});

freshmanConfirmationSubmitBtn.on("click", function() {

    checkboxData('freshman');

    let data = {
        data: {
            'freshman': JSON.parse(storage.getItem('freshman')),
        },
    }

    $('#check-form-freshman').val(JSON.stringify(data));
});

sophomoreConfirmationSubmitBtn.on("click", function() {

    checkboxData('sophomore');

    let data = {
        data: {
            'freshman': JSON.parse(storage.getItem('freshman')),
            'sophomore': JSON.parse(storage.getItem('sophomore')),
        },
    }

    $('#check-form-sophomore').val(JSON.stringify(data));
});

juniorConfirmationSubmitBtn.on("click", function() {

    checkboxData('junior');

    let data = {
        data: {
            'freshman': JSON.parse(storage.getItem('freshman')),
            'sophomore': JSON.parse(storage.getItem('sophomore')),
            'junior': JSON.parse(storage.getItem('junior')),
        },
    }

    $('#check-form-junior').val(JSON.stringify(data));
});

seniorConfirmationSubmitBtn.on("click", function() {

    checkboxData('senior');

    let data = {
        data: {
            'freshman': JSON.parse(storage.getItem('freshman')),
            'sophomore': JSON.parse(storage.getItem('sophomore')),
            'junior': JSON.parse(storage.getItem('junior')),
            'senior': JSON.parse(storage.getItem('senior')),
        },
    }

    $('#check-form-senior').val(JSON.stringify(data));
});

checkSubmitBtn.one('click', function () {

    setTimeout(function(){
        checkSubmitBtn.prop("disabled", true);
    },1);
})

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
})
