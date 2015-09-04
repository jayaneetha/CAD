<script type="text/javascript">
    function display_message(message_id) {
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "<?php echo base_url('/index.php/messages/mail_detail/'); ?>/" + message_id,
            success: function (data) {
                $('div.mail-box-content').replaceWith(data);
            }
        });
    }

    $('.mail-contact').on('click', function () {
        var message_id = $(this).data('message-id');
        display_message(message_id);
    });
    $('.mail-subject').on('click', function () {
        var message_id = $(this).data('message-id');
        display_message(message_id);
    });

    $('#inbox').dataTable({
        ordering: false,
        responsive: true
    });
</script>