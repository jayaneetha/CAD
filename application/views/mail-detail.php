<div class="mail-box-content animated fadeIn">

    <div class="mail-box-header">
        <div class="row">
            <div class="col-md-8 col-lg-8 col-sm-8">
                <h2>
                    <?= $message->subject ?>
                </h2>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-4">
                <div class="pull-right btn-group">
                    <button type="button" id="show-inbox" class="btn btn-primary btn-outline"><span
                            class="fa fa-arrow-circle-left"></span> Back
                    </button>
                    <button type="button" id="mark-unread" class="btn btn-primary btn-outline"><span
                            class="fa fa-eye-slash"></span> Mark
                        Unread
                    </button>
                    <button type="button" id="reply" class="btn btn-primary btn-outline"><span
                            class="fa fa-mail-reply"></span> Reply
                    </button>
                </div>
            </div>
        </div>

    </div>
    <div class="mail-box">
        <div class="mail-body">
            <?= $message->body ?>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<script type="text/javascript">

    function display_inbox() {
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "<?php echo base_url('/index.php/messages/inbox_ajax'); ?>",
            success: function (data) {
                $('div.mail-box-content').replaceWith(data);
            }
        });
    }

    function mark_unread() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "<?php echo base_url('/index.php/messages/mark_unread/' . $message->id); ?>",
            success: function (data) {
                if (data == 'success') {
                    toastr.success('Marked Unread');
                    display_inbox();
                } else {
                    toastr.error('Failed to marked unread');

                }
            }
        });

    }

    $('#show-inbox').click(function () {
        display_inbox();
    });

    $('#mark-unread').click(function () {
        mark_unread();
    });

    $('#reply').click(function () {
        window.location.href = "<?php echo base_url('compose'); ?>";
    });

</script>