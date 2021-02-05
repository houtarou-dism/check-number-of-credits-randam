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
let objData = [];
let data = {};
let tempData = {};

name.on("keypress", function (e) {
    if (e.which === 13) {
        return false;
    }
});

$("#select-submit-btn").one("click", function() {

    storage.clear();        //storageの全削除

    setTimeout(function(){
        $("#select-submit-btn").prop("disabled", true);
    },1);

    let selectData = {};

    selectData['select'] = document.getElementById('year-select').value;

    storage.setItem('select', JSON.stringify(selectData));
});

function checkboxData(select_year) {

    let itemKey = 0;
    let frm = document.getElementById(select_year);

    for(let i=0; i<frm.item.length; i++){
        if(frm.item[i].checked){
            tempData[itemKey] = frm.item[i].value;
            itemKey++;
        }
    }
    data[select_year] = tempData;
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

    objData.push(storage.getItem('select'));
    objData.push(storage.getItem('freshman'));

    $('#check-form-freshman').val(objData);
});

sophomoreConfirmationSubmitBtn.on("click", function() {

    checkboxData('sophomore');

    objData.push(storage.getItem('select'));
    objData.push(storage.getItem('freshman'));
    objData.push(storage.getItem('sophomore'));

    $('#check-form-sophomore').val(objData);
});

juniorConfirmationSubmitBtn.on("click", function() {

    checkboxData('junior');

    objData.push(storage.getItem('select'));
    objData.push(storage.getItem('freshman'));
    objData.push(storage.getItem('sophomore'));
    objData.push(storage.getItem('junior'));

    $('#check-form-junior').val(objData);
});

seniorConfirmationSubmitBtn.on("click", function() {

    checkboxData('senior');

    objData.push(storage.getItem('select'));
    objData.push(storage.getItem('freshman'));
    objData.push(storage.getItem('sophomore'));
    objData.push(storage.getItem('junior'));
    objData.push(storage.getItem('senior'));

    $('#check-form-senior').val(objData);
});

checkSubmitBtn.one('click', function () {

    setTimeout(function(){
        checkSubmitBtn.prop("disabled", true);
    },1);

    storage.clear();
})

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();
})
