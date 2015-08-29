<?php $this->load->view('partial/header'); ?>
</head>

<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <?php $this->load->view('admin/admin_accept_fund_payment_receipt_data', array(
        'receipt' => $receipt,
        'receiver' => $receiver,
        'transaction' => $transaction
    )); ?>

</div>

<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>

</html>
