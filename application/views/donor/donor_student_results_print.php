<?php $this->load->view('partial/header'); ?>
</head>

<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <?php $this->load->view('donor/donor_student_result_data'); ?>

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
