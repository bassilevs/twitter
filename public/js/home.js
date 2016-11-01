(function worker() {
    if(document.getElementById("size") != null){
        var size = document.getElementById("size").innerHTML;
        $.ajax({
            type: "GET",
            url: "tweets/new",
            data: {'size':size},
            success: function(data) {
                if (data['response'] > 0)
                {
                    document.getElementById("new-tweets").innerHTML = "View " +data['response'] + " new tweets";
                    $('#new-tweets-list-item').css("display", "block").show();
                }
            }
        });
    }
    setTimeout(worker, 3000);
})();

$(document).ready(function() {

    $("#status").focus(function () {
        if($(this).val() != '') {
            $('button[type="submit"]').prop('disabled', false);
        }
        $('#tweet-buttons').css("display", "flex").show();
    });

    $("#status").blur(function () {
        if($(this).val() == '') {
            $('button[type="submit"]').prop('disabled', false);
            $('#tweet-buttons').css("display", "flex").hide();
        }
    });

    $("#status").keyup(function() {
        if($(this).val() != '') {
            $('button[type="submit"]').prop('disabled', false);
        }
    });

});