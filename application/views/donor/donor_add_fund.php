<?php $this->load->view('partial/header'); ?>
<link href="<?php echo base_url('assets'); ?>/css/plugins/iCheck/custom.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation'); ?>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">

            <?php $this->load->view('partial/top_bar'); ?>

        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2><span class="fa fa-dollar"></span> Add a Fund</h2>
                <ol class="breadcrumb">
                    <li>
                        Fund
                    </li>
                    <li class="active">
                        <strong>Add Fund</strong>

                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Add Fund</h5>

                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form id="add_fund_form" method="post" class="form-horizontal" action="<?=base_url('/index.php/funds/add_fund') ?>">
                                <div class="form-group tooltip-demo">
                                    <label class="col-sm-2 control-label">Amount</label>

                                    <div class="col-sm-10">
                                        <input name="amount" required="" type="text" class="form-control" placeholder="Amount donated">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Transaction No.</label>

                                    <div class="col-sm-10">
                                        <input name="transaction_no" required="" type="text" class="form-control" placeholder="Transaction number appeared at the bottom of the slip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>

                                    <div class="col-sm-10">
                                        <textarea name="description" required="" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary btn-outline" type="submit">Add <span
                                                class="fa fa-plus"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/validate/jquery.validate.min.js"></script>

<script>
    $(document).ready(function () {

        $("#add_fund_form").validate({
            rules: {
                amount: {
                    required: true,
                    number: true
                },
                transaction_no: {
                    required: true,
                    number: true
                },
                description: {
                    required: false
                }
            }
        });

    });
</script>

</body>

</html>
