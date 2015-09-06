<?php $this->load->view('partial/header'); ?>

<link href="<?php echo base_url('assets'); ?>/css/plugins/datapicker/datepicker3.css" rel="stylesheet"
      xmlns="http://www.w3.org/1999/html">

</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><span class="fa fa-newspaper-o"></span> Donors Birthday List</h2>
                <ol class="breadcrumb">
                    <li>
                        Reports
                    </li>
                    <li class="active">
                        <strong>Donors Birthday List</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <form target="_blank" action="<?= base_url('/index.php/reports/donors_birthday/print') ?>"
                          method="POST">
                        <div class="form-group m-l-sm pull-right">
                            <button type="submit" class="btn btn-primary btn-outline"><i
                                    class="fa fa-print"></i>Print Report
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated bounceIn">
                    <?php $this->load->view('admin/admin_donors_birthday_data'); ?>
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

<!-- Data picker -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function () {

    });

</script>
</body>

</html>
