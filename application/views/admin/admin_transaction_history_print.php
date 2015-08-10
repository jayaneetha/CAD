<?php $this->load->view('partial/header'); ?>
</head>

<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <?php $this->load->view('admin/admin_transaction_history_data'); ?>

</div>

<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>

<!-- ChartJS-->
<script src="<?php echo base_url('assets'); ?>/js/plugins/chartJs/Chart.min.js"></script>

<!--Loads the JS commands to init the chart-->
<?php $this->load->view('admin/admin_transaction_history_data_js'); ?>

<script type="text/javascript">
    setTimeout(function () {
        window.print();
    }, 2000);
</script>

</body>

</html>
