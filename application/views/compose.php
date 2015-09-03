<?php $this->load->view('partial/header'); ?>

<!-- Summernote -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/summernote/summernote.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">

<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
<!-- Chosen-->
<link href="<?php echo base_url('assets'); ?>/css/plugins/chosen/chosen.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>

        </div>

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12 animated fadeInRight">
                    <div class="mail-box-content">
                        <div class="mail-box-header">
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    <h2>
                                        Compose Message
                                    </h2>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <div class="text-right tooltip-demo">
                                        <button id="send" class="btn btn-outline btn-sm btn-primary"
                                                data-toggle="tooltip"
                                                data-placement="top" title="Send"><i class="fa fa-reply"></i> Send
                                        </button>
                                        <a href="/inbox" class="btn btn-outline btn-white btn-sm" data-toggle="tooltip"
                                           data-placement="top" title="Discard message"><i class="fa fa-times"></i>
                                            Discard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mail-box">
                            <div class="mail-body">
                                <form id="compose_message_form" action="/index.php/messages/send"
                                      class="form-horizontal"
                                      method="POST">
                                    <div class="form-group"><label class="col-sm-2 control-label">To:</label>

                                        <div class="col-sm-10">
                                            <select id="to" name="to[]" data-placeholder="Choose a recipient"
                                                    class="chosen-select form-control"
                                                    multiple tabindex="4">
                                                <?php foreach ($users as $user): ?>
                                                    <option
                                                        value="<?= $user->id ?>"><?= $user->first_name . " " . $user->last_name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-2 control-label">Subject:</label>

                                        <div class="col-sm-10"><input name="subject" id="subject" type="text"
                                                                      class="form-control" value=""></div>
                                    </div>
                                    <textarea name="body" id="body" class="hidden" hidden=""></textarea>
                                </form>

                            </div>

                            <div class="mail-text h-200">

                                <div class="summernote">

                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="clearfix"></div>


                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>


<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>
<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<!-- Data Tables -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/dataTables/dataTables.tableTools.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- SUMMERNOTE -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/summernote/summernote.min.js"></script>

<!-- Chosen -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.summernote').summernote(
            {
                height: 250,                 // set editor height

                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor

                focus: true
            }
        );

        $("#compose_message_form").validate({
            rules: {
                subject: {
                    required: true,
                    minlength: 5
                }
            }
        });

        var edit = function () {
            $('.click2edit').summernote({focus: true});
        };
        var save = function () {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
        $('#send').click(function () {
            $('#body').val($('.summernote').code());
            $('#compose_message_form').submit();
        });
    });
</script>
</body>

</html>
