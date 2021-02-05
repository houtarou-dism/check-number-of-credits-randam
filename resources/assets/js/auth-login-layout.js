bubbly({
    colorStart: '#ffd78c',
    colorStop: '#ffd17a',
    blur:1,
    compose: 'source-over',
    bubbleFunc:() => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
});

$("#submit-btn").one("click", function() {
    setTimeout(function(){
        $("#submit-btn").prop("disabled", true);
    },1);
});
