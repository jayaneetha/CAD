<?php $this->load->view('partial/header'); ?>
<!-- Data Tables -->
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?php echo base_url('assets'); ?>/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/admin_navigation', array('user' => $user, 'position' => $position)); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>

        </div>

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12 animated fadeInRight">
                    <?php $this->load->view('inbox-data', array('inbox_messages' => $inbox_messages)) ?>
                </div>

            </div>
        </div>
        <div class="footer">
            <?php $this->load->view('partial/footer'); ?>
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
<script>
    $(document).ready(function () {
        function display_message(message_id) {
            $.ajax({
                type: "GET",
                dataType: 'html',
                url: "<?php echo base_url('messages/mail_detail/'); ?>/" + message_id,
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
    });
</script>
</body>

</html>
