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
        <div class="mail-attachment">
            <p>
                <span><i class="fa fa-paperclip"></i> 2 attachments - </span>
                <a href="#">Download all</a>
                |
                <a href="#">View all images</a>
            </p>

            <div class="attachment">
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="file-name">
                                Document_2014.doc
                                <br/>
                                <small>Added: Jan 11, 2014</small>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="img/p1.jpg">
                            </div>
                            <div class="file-name">
                                Italy street.jpg
                                <br/>
                                <small>Added: Jan 6, 2014</small>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="img/p2.jpg">
                            </div>
                            <div class="file-name">
                                My feel.png
                                <br/>
                                <small>Added: Jan 7, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
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
            url: "<?php echo base_url('messages/delete_message/' . $message->id); ?>",
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