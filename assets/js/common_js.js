/**
 * Created by Admin on 8/9/15.
 */

setInterval(function () {
    check_mail();
}, 60000);

var check_mail = function () {
    $.ajax({
        type: "GET",
        dataType: 'html',
        url: "/index.php/messages/get_inbox_count/",
        success: function (data) {
            if(data=='error'){
                $('#inbox-count').replaceWith("");
            }else {
                $('#inbox-count').replaceWith(data);
            }
        }
    });
    $.ajax({
        type: "GET",
        dataType: 'html',
        url: "/index.php/messages/notification/",
        success: function (data) {
            $('#mail-notification').replaceWith(data);
        }
    });
};