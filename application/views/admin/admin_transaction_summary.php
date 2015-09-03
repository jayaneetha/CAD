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
                <h2><span class="fa fa-newspaper-o"></span> Transaction Summary Report</h2>
                <ol class="breadcrumb">
                    <li>
                        Reports
                    </li>
                    <li class="active">
                        <strong>Transaction Summary Report</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="/admin_transaction_summary_print" target="_blank" class="btn btn-primary btn-outline"><i
                            class="fa fa-print"></i> Print Report </a>
                </div>
            </div>
        </div>
        <div class="wrapper white-bg row">
            <div class="col-sm-12">
                <form class="form-inline m-sm" action="#" method="get">
                    <div class="form-group" id="date_range">
                        <label>Date Range: </label>

                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="start" value="05/14/2014"/>
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control" name="end" value="05/22/2014"/>
                        </div>
                    </div>
                    <div class="form-group m-l-sm pull-right">
                        <button type="submit" class="btn btn-success btn-outline pull-right ">Generate Report</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated bounceIn">
                    <?php $this->load->view('admin/admin_transaction_summary_data'); ?>
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
        $('#date_range .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });


    });

</script>
</body>

</html>
