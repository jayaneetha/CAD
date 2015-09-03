<?php $this->load->view('partial/header'); ?>

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
                <h2><span class="fa fa-newspaper-o"></span> Transaction History Report</h2>
                <ol class="breadcrumb">
                    <li>
                        Reports
                    </li>
                    <li class="active">
                        <strong>Transaction History Report</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="/admin_transaction_history_print" target="_blank" class="btn btn-primary btn-outline"><i
                            class="fa fa-print"></i> Print Report </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated bounceIn">
                    <?php $this->load->view('admin/admin_transaction_history_data'); ?>
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

<!-- ChartJS-->
<script src="<?php echo base_url('assets'); ?>/js/plugins/chartJs/Chart.min.js"></script>

<!--Loads the JS commands to init the chart-->
<?php $this->load->view('admin/admin_transaction_history_data_js'); ?>

<script type="text/javascript">
    $(document).ready(function () {

    });

</script>
</body>

</html>
