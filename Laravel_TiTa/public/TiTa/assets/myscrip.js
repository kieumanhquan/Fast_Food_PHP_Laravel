$(document).ready(function () {
    $("#date-popover").popover({html: true, trigger: "manual"});
    $("#date-popover").hide();
    $("#date-popover").click(function (e) {
        $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
        action: function () {
            return myDateFunction(this.id, false);
        },
        action_nav: function () {
            return myNavFunction(this.id);
        },
        ajax: {
            url: "show_data.php?action=1",
            modal: true
        },
        legend: [
            {type: "text", label: "Special event", badge: "00"},
            {type: "block", label: "Regular event", }
        ]
    });
});


function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}
$("div.alert").delay(5000).slideUp();


function xacnhanxoa(msg) {
    if(window.confirm(msg)){
        return true;
    }
    return false;
}
$('.toggle').click(function(){
    // Switches the Icon
    $(this).children('i').toggleClass('fa-pencil');
    // Switches the forms
    $('.form').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: "toggle"
    }, "slow");
});

$(document).ready(function () {
    $("#addImages").click(function () {
        $("#insert").append('<div class="form-group"><input type="file" name="fImages[]"/></div>');
    });
});

$(document).ready(function () {
    $("a#del_img_demo").on('click',function () {
        var url = "http://localhost:8000/Admin/menu/delimg/";
        var _token = $("form[name='frmEditProduct']").find("input[name='_token']").val();
        var idHinh = $(this).parent().find("img").attr("idHinh");
        var img = $(this).parent().find("img").attr("src");
        var rid = $(this).parent().find("img").attr("id");
        $.ajax({
            url : url + idHinh,
            type: 'GET',
            cache: false,
            data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
            success: function (data) {
                if(data == "Oke"){
                    $("#"+rid).remove();
                }else {
                    alert("Error ! Please Contact Admin");
                }
            }
        });
    });
});

$(document).ready(function () {
    $("a#ttrang").on('click',function () {
        var url = "http://localhost:8000/Admin/donhang/check/";
        var _token = $("form[name='checkbox']").find("input[name='_token']").val();
        alert('_token')
    });
});
// Loading
$(function() {
    //    fancybox
    jQuery(".fancybox").fancybox();
});
// $(function(){
//     $("select.styled").customSelect();
// });
function onReady(callback) {
    var intervalID = window.setInterval(checkReady, 1000);

    function checkReady() {
        if (document.getElementsByTagName('body')[0] !== undefined) {
            window.clearInterval(intervalID);
            callback.call(this);
        }
    }
}

function show(id, value) {
    document.getElementById(id).style.display = value ? 'block' : 'none';
}

onReady(function () {
    show('page', true);
    show('loading', false);
});


// Ajax
