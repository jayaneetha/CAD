<?php $this->load->view('partial/header'); ?>

<link href="<?php echo base_url('assets'); ?>/css/plugins/switchery/switchery.css" rel="stylesheet">

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
                <h2><span class="fa fa-newspaper-o"></span> Donor Birthday List</h2>
                <ol class="breadcrumb">
                    <li>
                        Reports
                    </li>
                    <li class="active">
                        <strong>Donor Birthday List</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="/admin_donor_birthday_list_print" target="_blank" class="btn btn-primary btn-outline"><i
                            class="fa fa-print"></i> Print Report </a>
                </div>
            </div>
        </div>
        <div class="wrapper white-bg row">
            <div class="col-sm-12">
                <form class="form-inline m-sm" action="#" method="get">
                    <div class="form-group m-l-xl">
                        <label for="approved">Show Upcoming only: </label>
                        <input type="checkbox" name="show_upcoming" id="show_upcoming" value="upcoming"/>
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
                    <?php $this->load->view('admin/admin_donor_birthday_list_data'); ?>
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

<!-- Switchery -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/switchery/switchery.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        new Switchery(document.querySelector('#show_upcoming'), {color: '#1c84c6'});
    });

</script>
</body>

</html>
