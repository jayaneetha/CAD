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
                <h2>Receipt</h2>
                <ol class="breadcrumb">
                    <li>
                        Funds
                    </li>
                    <li class="active">
                        <strong>Fund accept receipt</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="<?= base_url('/index.php/receipts/print_receipt/fund_accept/' . $receipt->id) ?>"
                       target="_blank" class="btn btn-primary btn-outline">
                        <i class="fa fa-print"></i> Print Receipt </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated bounceIn">
                    <?php $this->load->view('admin/admin_accept_fund_payment_receipt_data', array(
                        'receipt' => $receipt,
                        'receiver' => $receiver,
                        'transaction' => $transaction
                    )); ?>
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


</body>

</html>
