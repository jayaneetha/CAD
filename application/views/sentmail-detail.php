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
                    <button type="button" id="show-sentbox" class="btn btn-primary btn-outline"><span
                            class="fa fa-arrow-circle-left"></span> Back
                    </button>
                    <button type="button" id="delete" class="btn btn-danger btn-outline"><span
                            class="fa fa-trash"></span> Delete
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

    function display_sentbox() {
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "<?php echo base_url('messages/sentbox_ajax'); ?>",
            success: function (data) {
                $('div.mail-box-content').replaceWith(data);
            }
        });
    }

    function delete_message() {
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        };
        $.ajax({
            type: "GET",
            dataType: 'html',
            url: "<?php echo base_url('/index.php/messages/delete_message/' . $message->id); ?>",
            success: function (data) {
                if (data == 'success') {
                    toastr.success('Message Deleted');
                    display_sentbox();
                } else {
                    toastr.error('Failed to Delete Message');

                }
            }
        });

    }


    $('#show-sentbox').click(function () {
        display_sentbox();
    });

    $('#delete').click(function () {
        delete_message();
    });

</script>